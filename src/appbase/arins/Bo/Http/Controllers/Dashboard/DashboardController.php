<?php

namespace Arins\Bo\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

use Arins\Repositories\Activitytype\ActivitytypeRepositoryInterface;
use Arins\Repositories\Activity\ActivityRepositoryInterface;
use Arins\Repositories\ActivityView\ActivityViewRepositoryInterface;
use Arins\Repositories\ActivityViewjoin\ActivityViewjoinRepositoryInterface;

use Arins\Facades\Response;
use Arins\Facades\Filex;
use Arins\Facades\Formater;
use Arins\Facades\ConvertDate;

class DashboardController extends Controller
{

    protected $sViewRoot;
    protected $data, $dataView, $dataViewjoin;
    protected $dataActivitytype;
    protected $dataModel;
    protected $validateFields;


    /**
     * Create a new controller instance.
     *
     * Method Name: Constructor
     * 
     * @return void
     */
    public function __construct(ActivityRepositoryInterface $parData,
                                ActivityViewRepositoryInterface $parDataView,
                                ActivityViewjoinRepositoryInterface $parDataViewjoin,
                                ActivitytypeRepositoryInterface $parActivitytype)
    {
        $this->middleware('auth.admin');
        $this->middleware('is.admin');

        $psViewRoot = 'bo.dashboard';
        $this->sViewRoot = $psViewRoot;
        $this->data = $parData;
        $this->dataView = $parDataView;
        $this->dataViewjoin = $parDataViewjoin;
        $this->dataActivitytype = $parActivitytype;
        $this->validateFields = [
            //code array here...
            'startdt' => 'required',
            'enddt' => 'required',
            'activitytype_id' => 'required',
            'description' => 'required',
        ];
        
    }

    /**
     * Method Name: index
     * 
     * http method: GET
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $untilDate = Carbon::today();

        $year = $untilDate->year;
        $month = $untilDate->month;
        $months = config('a1.date.iso.months');
        $monthKeys = array_keys($months);
        $monthText = $monthKeys[$month];
        

        $incident = $this->dataView->countOpenSupportIncidentByUserUntilDate($userId, $untilDate);
        $request = $this->dataView->countOpenSupportRequestByUserUntilDate($userId, $untilDate);
        $pending = $this->dataView->countSupportPendingByUserUntilDate($userId, $untilDate);
        $mytask = $this->dataViewjoin->getSupportByUser($userId, 5);
        $project = $this->dataViewjoin->getProjectByUser($userId, 5);

        $viewModel = Response::viewModel([
            'ticket' => [
                            'incident' => $incident,
                            'request' => $request,
                            'pending' => $pending,
                        ],
            'mytask' => $mytask,
            'project' => $project,
        ]);

        return view($this->sViewRoot.'.index',
        ['viewModel' => $viewModel, 'year' => $year, 'month' => $month, 'monthText' => $monthText]);
    }

}
