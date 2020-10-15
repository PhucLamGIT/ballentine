<?php
namespace Zone\Management\Controllers;

use Illuminate\Http\Request;
use Zone\Management\Helpers\MainHelper;
use Zone\Management\Repositories\RoleRepository;
use Zone\Management\Repositories\UserRepository;

class UserController {

    protected $repoUser, $roleRepo;

    public function __construct(UserRepository $repoUser, RoleRepository $roleRepo)
    {
        $this->repoUser = $repoUser;
        $this->roleRepo = $roleRepo;
    }

    public function index()
    {
        $arrUserList = $this->repoUser->getList();
        $data = compact('arrUserList');

        return view('management::user.index', $data);
    }

    public function create()
    {
        return view('management::user.form');
    }

    public function insert(Request $request)
    {
        $arrRequest = $request->all();
        $arrFrmInput = $arrFullName = array();
        isset($arrRequest['fname']) && $arrRequest['fname'] ? $arrFullName['first_name'] = trim($arrRequest['fname']) : '';
        isset($arrRequest['lname']) && $arrRequest['lname'] ? $arrFullName['last_name']  = trim($arrRequest['lname']) : '';
        $arrFrmInput['name'] = MainHelper::formatFullName($arrFullName);
        $arrFrmInput['email'] = isset($arrRequest['email']) && $arrRequest['email'] ? trim($arrRequest['email']) : '';
        $arrFrmInput['password'] = isset($arrRequest['pwd']) && $arrRequest['pwd'] ? bcrypt(trim($arrRequest['pwd'])) : '';

        $insertedId = $this->repoUser->insert($arrFrmInput);
    }

    public function edit($id, Request $request)
    {
        if(!$id){
            return redirect('management/user');
        }

        $user_id = (int)$id;
        $userItem = $this->repoUser->getById(['user_id' => $user_id]);
        $data = compact('userItem');
        return view('management::user.form', $data);
    }

    public function update($id, Request $request)
    {
        
    }
}
