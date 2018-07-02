<?php

namespace App\Http\Controllers\Systems;

use App\Http\Controllers\Controller as Controller;
use App\Http\Requests;
use App\Http\Requests\Systems\BranchCreateRequest;
use App\Http\Requests\Systems\BranchUpdateRequest;
use App\Repositories\Systems\BranchRepository;
use App\Validators\Systems\BranchValidator;
use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class BranchesController.
 *
 * @package namespace App\Http\Controllers\Systems;
 */
class BranchesController extends Controller {
    /**
     * @var BranchRepository
     */
    protected $repository;

    /**
     * @var BranchValidator
     */
    protected $validator;

    /**
     * BranchesController constructor.
     *
     * @param BranchRepository $repository
     * @param BranchValidator $validator
     */
    public function __construct(BranchRepository $repository, BranchValidator $validator) {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $data = $this->repository->paginate();
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $data,
            ]);
        }

        return view('administrator.systems.branch.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BranchCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(BranchCreateRequest $request) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $branch = $this->repository->create($request->all());

            $response = [
                'message' => trans('messages.create_success'),
                'data'    => $branch->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('branch.index')->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag(),
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $branch = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $branch,
            ]);
        }

        return view('administrator.systems.branch.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $data = $this->repository->find($id);

        return view('administrator.systems.branch.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BranchUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BranchUpdateRequest $request, $id) {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $branch = $this->repository->update($request->all(), $id);

            $response = [
                'message' => trans('messages.update_success'),
                'data'    => $branch->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->route('branch.index')->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag(),
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => trans('messages.delete_success'),
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', trans('messages.delete_success'));
    }

    public function create() {
        return view('administrator.systems.branch.create');
    }
}
