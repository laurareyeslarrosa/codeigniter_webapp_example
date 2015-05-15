<?php
class Auth extends CI_Controller {

   // private $abm_status;

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('url'));
        $this->load->model('Usuarios_model');
    }

    public function login() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['folder_name'] = AUTH_CLASS;

                $data['error_login_message'] = '';
     //   $data['title'] = 'Login ' . USUARIOS_CLASS;
     

        $this->form_validation->set_rules('nombre_usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');

        //ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc5

        
        if ($this->form_validation->run() === TRUE) {
            $user = $this->Usuarios_model->get_Usuario_credentials();

         //   var_dump($user);
           // var_dump($user['id']);

            if ($user !== null)
            {
                $sess_array = array(
                    'user_id' => $user['id'],
                    'user_name' => $user['usuario']
                );
                
                $this->session->set_userdata(LOGGED_IN, $sess_array);

                redirect(base_url(INDEX_FILE . 'Backend/' . TRABAJOS_CLASS));

    //    $this->load->library('../controllers/Backend/usuarios');
      //          $this->usuarios->index();
       //         var_dump($this->session->userdata(LOGGED_IN));
            }
            else

            {
                $data['error_login_message'] = 'El usuario o la contraseña son incorrectos';
                $this->load->view('templates/header', $data);
            $this->load->view(AUTH_CLASS . '/login', $data);                
            }

            /*
                $this->userslib->set_access_log($row->id_user);
                $sess_array = array(
                    'id_user' => $row->id_user,
                    'email' => $row->email,
                    'first_name' => $row->first_name,
                    'last_name' => $row->last_name,
                    'gender' => $row->gender,
                    'active' => $row->active,
                    'verified' => $row->verified,
                );
                $sess_array['access_level'] = $this->authlib->get_user_access_level($row->id_access_level)[0]->level;
                $this->load->library('session');
                $this->session->set_userdata('logged_in', $sess_array);
            */


  //          var_dump($user);

//            var_dump(hash('sha512', $this->input->post('password')));
            

            //                            $this->template->set(redirect(base_url('validacion')));


        } else {

            $this->load->view('templates/header', $data);
           // $this->login();
            //redirect(base_url('Auth/login'));
            $this->load->view(AUTH_CLASS . '/login', $data);
        }

    }




    public function logout() {
                    $this->session->set_userdata(LOGGED_IN, null);
             
          //   $this->load->view(AUTH_CLASS . '/login');
redirect(base_url(INDEX_FILE . 'login'));
          //
    }
}