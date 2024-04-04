<?php

class Posts extends Controller
{

    private $postModel;

    public function __construct()
    {

        $this->postModel = $this->model('Post');
    }

    public function index()
    {

        $posts = $this->postModel->getPosts();

        $data = [
            'posts' => $posts
        ];

        $this->render('index', $data);
    }

    public function create()
    {
        // Vérifier si le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {




            $title =  trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $idUser = $_SESSION['user_id'] ?? null;

            $title_error = '';
            $content_error = '';



            if (empty($title)) {
                $title_error = 'Veuillez entrer un titre';
            }


            if (empty($content)) {
                $content_error = 'Le contenu ne peut pas être vide';
            }
            if (empty($idUser)) {
                flash('Veuillez vous connecter pour poster un article', 'alert alert-danger');
                $this->render('create');
            }



            // inserer le post
            if (empty($title_error) && empty($content_error)) {
                $data = [
                    'title' => $title,
                    'content' => $content,
                    'idUser' => $idUser,
                    'date' => date('Y-m-d H:i:s')
                ];

                // Appeler la méthod 
                if ($this->postModel->insertPost($data)) {
                    // Succès
                    flash('Post ajouté avec succès', 'alert alert-success');
                    redirect('posts/index');
                } else {
                    // Erreur 
                    flash('Une erreur est survenue lors de l\'ajout du post', 'alert alert-danger');
                    redirect('posts/create');
                }
            } else {
                // Renvoyer les erreurs
                $data = [
                    'title' => $title,
                    'content' => $content,
                    'title_error' => $title_error,
                    'content_error' => $content_error
                ];


                $this->render('create', $data);
            }
        } else {
            // Afficher le formulaire
            $this->render('create');
        }
    }

    public function showDetail($id)
    {
        if (is_numeric($id)) {
            $onePost = $this->postModel->showDetail($id);
            //dd($onePost);
            //dd($_SESSION);
            if ($onePost) {
                $data = [
                    'onePosts' => $onePost
                ];
                $this->render('show', $data);
            }
        }
    }


    public function showPostsUser($id)
    {
        if (checkUserLog() && $id == $_SESSION['user_id'] && is_numeric($id)) {

            $allPostUser = $this->postModel->showPostsUsers($id);

            if ($allPostUser) {
                $data = [
                    'posts' => $allPostUser
                ];
                $this->render('PostsUser', $data);
            }
        } else if (checkUserLog()) {
            redirect('pages/index');
            flash('Vous essayez d\'accéder a des Articles qui ne vous appartiennent pas !');
        } else {
            redirect('users/login');
            flash('Merci de vous Connecter');
        }
    }

    public function confirmDelete($id)
    {
        //mettre une verif restriction
        if (checkUserLog() && is_numeric($id)) {
            $data = [
                'id' => $id
            ];
            $this->render('confirmDelete', $data);
        }
    }

    public function deletePost($id)
    {
        if (is_numeric($id)) {

            $onePost = $this->postModel->findPost($id);
            //dd($onePost->idUser);
        }
        if (checkUserLog() && isset($_POST['delete_post']) && $onePost->idUser == $_SESSION['user_id']) {

            $CheckDelete = $this->postModel->deletePost($id);

            if ($CheckDelete) {
                redirect('posts/PostsUser.php');
                flash('Suppression effectué !');
            }
        } else if (checkUserLog() && isset($_POST['delete_post'])) {
            redirect('pages/index.php');
            flash('Vous essayez de supprimer un Article qui ne vous appartient pas !!');
        } else if (!$_SESSION['user_id']) {
            redirect('users/login');
            flash('Merci de vous connecter !');
        } else {
            $this->render('confirmDelete.php', $id);
        }
    }

    public function updatePost($id)
    {   $onePost = $this->postModel->showDetail($id);

        if(checkUserLog() && is_numeric($id) && $_SERVER['REQUEST_METHOD'] == 'POST' && $onePost->idUser == $_SESSION['user_id']){

            $title =  trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
            $idUser = $_SESSION['user_id'] ?? null;
            $postId = $onePost->id;
            //dd($postId);

            $title_error = '';
            $content_error = '';

            if (empty($title)) {
                $title_error = 'Veuillez entrer un titre';
            }


            if (empty($content)) {
                $content_error = 'Le contenu ne peut pas être vide';
            }
            if (empty($idUser)) {
                flash('Veuillez vous connecter pour modifier un article', 'alert alert-danger');
                $this->render('index');
            }
            if (empty($title_error) && empty($content_error)) {
                $data = [
                    'title' => $title,
                    'content' => $content,
                    'idUser' => $idUser,
                    'date' => date('Y-m-d H:i:s'),
                    'postId' => $postId
                ];
                if ($this->postModel->updatePost($data)) {

                    //dd($this->postModel->updatePost($data));
                    // Succès
                    flash('Post modifié avec succès', 'alert alert-success');
                    redirect('posts/PostsUser');
                } else {
                    // Erreur 
                    flash('Une erreur est survenue lors de la modification du post', 'alert alert-danger');
                    redirect('posts/index');
                }
            }
            else {
                // Renvoyer les erreurs
                $data = [
                    'onePost' => $onePost,
                    'title' => $title,
                    'content' => $content,
                    'title_error' => $title_error,
                    'content_error' => $content_error
                ];


                $this->render('updatePost', $data);
            }
            
        }
        elseif (checkUserLog() && is_numeric($id)) {
            
            //dd($onePost);
            //dd($_SESSION);
            if ($onePost) {
                $data = [
                    'onePost' => $onePost
                ];
            $this->render('updatePost', $data);
            }
        }
        
    }
}
