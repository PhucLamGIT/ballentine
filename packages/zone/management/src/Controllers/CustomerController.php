<?php
namespace Zone\Management\Controllers;

use Illuminate\Http\Request;
use Zone\Management\Helpers\MainHelper;
use Zone\Management\Repositories\RoleRepository;
use Zone\Management\Repositories\UserRepository;
use Zone\Management\Repositories\CustomerRepository;

class CustomerController {

    protected $repoCustomer, $repoUser, $roleRepo;

    public function __construct(CustomerRepository $repoCustomer, UserRepository $repoUser, RoleRepository $roleRepo)
    {
        $this->repoCustomer = $repoCustomer;
        $this->repoUser = $repoUser;
        $this->roleRepo = $roleRepo;
    }

    public function index()
    {
        $arrCustomerList = $this->repoCustomer->getList();
        $data = compact('arrCustomerList');

        return view('management::customer.index', $data);
    }

    public function create()
    {
        return view('management::customer.form');
    }

    public function insert(Request $request)
    {
        $arrRequest = $request->all();

        $arrFrmInput = array(
           'customer_name' => trim($arrRequest['customer_name']),
           'customer_phone'=> trim($arrRequest['customer_phone']),
           'customer_email'=> trim($arrRequest['customer_email']),
           'customer_address' => trim($arrRequest['customer_address']),
           'customer_password'=> bcrypt(trim($arrRequest['customer_password'])),
           'customer_city'  => (int) $arrRequest['customer_city'],
           'customer_district'  => (int) $arrRequest['customer_district'],
           'customer_note' => isset($arrRequest['customer_note']) && $arrRequest['customer_note'] ? $arrRequest['customer_note']: '',
           'customer_type' =>1,
           'customer_status' => $arrRequest['customer_status']
        );

        $insertedId = $this->repoCustomer->insert($arrFrmInput);
    }

    public function edit($id, Request $request)
    {
        if(!$id){
            return redirect('management/customer');
        }

        $customer_id = (int)$id;
        $customerItem = $this->repoCustomer->getById(['customer_id' => $customer_id]);
        $data = compact('customerItem');
        return view('management::customer.form', $data);
    }

    public function update($id, Request $request)
    {
        $arrRequest = $request->except(['_token','_method']);
        $result = $this->repoCustomer->update($id, $arrRequest);
        return back()->withStatus(__('Customer successfully updated.'));
    }
}
