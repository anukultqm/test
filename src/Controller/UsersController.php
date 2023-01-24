<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{

    public function initialize(): void
    {    
        $this->Model = $this->loadModel('Posts');
        $this->Model = $this->loadModel('Comments');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');      
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function beforeFilter(\Cake\Event\EventInterface $event)
{
    parent::beforeFilter($event);
    // Configure the login action to not require authentication, preventing
    // the infinite redirect loop issue
    $this->Authentication->addUnauthenticatedActions(['login','add']);
}

public function login()
{
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();

    // regardless of POST or GET, redirect if user is logged in
    if ($result && $result->isValid()) {

        $email = $this->request->getData('email');
        $session = $this->getRequest()->getSession();
        $session->write('email',$email);     

        // redirect to /articles after login success
        $redirect = $this->request->getQuery('redirect', ['controller' => 'Users','action' => 'index',]);

        return $this->redirect($redirect);
    }
    // display error if user submitted and authentication failed
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Invalid username or password'));
    }
}

public function logout()
{
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result && $result->isValid()) {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}



   


    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Comments', 'Posts'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            $image = $this->request->getData('image_file');

            $name = $image->getClientFilename();

            $targetPath = WWW_ROOT.'img'.DS.$name;

            if($name)  
                $image->moveTo($targetPath);
                $user->image = $name;


            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    // add user post.. 

   public function postadd($userid){

    $post = $this->Posts->newEmptyEntity();

    if ($this->request->is('post')) {
        $data=$this->request->getData();

        $data['user_id']= $userid;

        $post = $this->Posts->patchEntity($post,$data) ;
        $image = $this->request->getData('Post_file');
        
        $name = $image->getClientFilename();
        
        // print_r($name);
        // die;
        $targetPath = WWW_ROOT.'img'.DS.$name;

        if($name)  
            $image->moveTo($targetPath);
            $post->image = $name;


        if ($this->Posts->save($post)) {
            $this->Flash->success(__('The user has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The user could not be saved. Please, try again.'));
    }
    $this->set(compact('post'));

   

   }

 /*....post data view...*/

   public function postview($id=null,$userid=null){

    $post = $this->Posts->get($id, [
        'contain' => ['Comments'],
    ]);
 
  
    $comment = $this->Comments->newEmptyEntity();
    if ($this->request->is('post')) {

        $data=$this->request->getData();
        
        $comment = $this->Comments->patchEntity($comment,$data);
        $comment['post_id']= $id;
    //    echo'<pre>';
    //     print_r($comment);
    //     die;

        if ($this->Comments->save($comment)) {

            $this->Flash->success(__('The user has been saved.'));

            // return $this->redirect(['action' => 'postview',$post->$post_id]);
        }
        else{

            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
    }

    $this->set(compact('post','comment'));  

   }


   public function commentDelete($id = null)
   {
       $this->request->allowMethod(['post', 'Delete']);
       $comment = $this->comments->get($id);
       if ($this->comments->delete($comment)) {
           $this->Flash->success(__('The user has been deleted.'));
       } else {
           $this->Flash->error(__('The user could not be deleted. Please, try again.'));
       }

       return $this->redirect(['action' => 'postview']);
   }



   public function home(){

    $posts = $this->paginate($this->Posts);

    $this->set(compact('posts'));
}

}
