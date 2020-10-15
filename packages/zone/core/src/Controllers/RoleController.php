<?php
namespace Zone\Management\Controllers;

use Illuminate\Http\Request;
use Zone\Management\Repositories\RoleRepository;

class RoleController
{
    protected $roleRepo;
    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }

    public function index()
    {
        $arrRoleList = $this->roleRepo->getList([]);
        $arrStatus   = $this->roleRepo->getStatus(); 
        $data = compact('arrRoleList', 'arrStatus');

        return view('management::role.index', $data);
    }

    public function create(Request $request)
    {
        return view('management::role.form');
    }

    public function insert(Request $request)
    {
        $arrRequest = $request->all();
        $arrFrmInput = array(
            'name'   => isset($arrRequest['role_name']) && $arrRequest['role_name'] ? trim($arrRequest['role_name']) : '',
            'status' => isset($arrRequest['role_status']) ? (int) $arrRequest['role_status'] : 0
        );

        $insertedId = $this->roleRepo->insert($arrFrmInput);
        if($insertedId > 0){
            return redirect('management/role/'.$insertedId.'/edit');
        }
    }

    public function edit($id, Request $request)
    {
        if(!$id){
            return redirect('management/role');
        }

        $role_id = (int)$id;
        $roleItem = $this->roleRepo->getById(['role_id' => $role_id]);

        $data = compact('roleItem');

        return view('management::role.form', $data);
    }

    public function update($id, Request $request)
    {
        if(!$id){
            return redirect('management/role');
        }
        $role_id = (int)$id;

        $arrRequest = $request->all();
        $arrFrmInput = array(
            'name'   => isset($arrRequest['role_name']) && $arrRequest['role_name'] ? trim($arrRequest['role_name']) : '',
            'status' => isset($arrRequest['role_status']) ? (int) $arrRequest['role_status'] : 0
        );

        $arrResponse = $this->roleRepo->update($arrFrmInput, $role_id);

        return back()->withStatus(__('Role successfully updated.'));
    }
}