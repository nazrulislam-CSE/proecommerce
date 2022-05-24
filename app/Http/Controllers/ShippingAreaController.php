<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ship_division;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;
use Session;

class ShippingAreaController extends Controller
{
    // ==================== START SHIP DIVISION ================== //

    //division view
    public function DivisionView(){

        $divisions = Ship_division::orderBy('id','DESC')->get();
        return view('BackEnd.division.view_division', compact('divisions'));
    }

    // division store //
    public function DivisionStore(Request $request)
    {
        $this->validate($request,[
            'division_name' => 'required',
        ]);


        $division = Ship_division::where('division_name',$request->division_name)->first();

        if($division){
            Session::flash('warning','Division already Created.');
            return redirect()->back(); 
        }else{
            $division = Ship_division::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success','Division Inserted Successfully.');
        return redirect()->back();
        }
    }

    // division edit //
    public function DivisionEdit($id){

        $divisions = Ship_division::find($id);
        return view('BackEnd.division.edit_division', compact('divisions'));
    }

    // divison update //
    public function DivisionUpdate(Request $request, $id){

        $this->validate($request,[
            'division_name' => 'required',
        ]);

        Ship_division::findOrFail($id)->update([
            'division_name' =>$request->division_name,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success','Division Updated Successfully');
        return redirect()->route('manage.division');

    }

    // division delete //
    public function DivisionDelete($id){

        Ship_division::findOrFail($id)->delete();
        Session::flash('info','Division Deleted Successfully');
        return redirect()->back();
    }


    // division active //
    public function divisionactive($id){
        $division = Ship_division::find($id);
        $division->status = 1;
        $division->save();

        Session::flash('success','Successfully Division Changed.');
        return redirect()->back();
    }

    // division inactive //
    public function divisioninactive($id){
        $division = Ship_division::find($id);
        $division->status = 0;
        $division->save();

        Session::flash('success','Successfully Division Changed.');
        return redirect()->back();
    }

    // ==================== END SHIP DIVISION ================== //

    // ==================== START SHIP DISTRICT ================== //
    //district view
    public function DistrictView(){

        $divisions = Ship_Division::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::with('division')->orderBy('id','DESC')->get(); // division realtion name ta //
        return view('BackEnd.district.view_district', compact('district','divisions'));
    }

    // district store //
    public function DistrictStore(Request $request)
    {
        $this->validate($request,[
            'division_id' => 'required',
            'district_name' => 'required'
        ]);


        $district = ShipDistrict::where('district_name',$request->district_name)->first();

        if($district){
            Session::flash('warning','District already Created.');
            return redirect()->back(); 
        }else{
            $district = ShipDistrict::insert([
            'district_name' =>$request->district_name,
            'division_id' => $request->division_id,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success','District Inserted Successfully.');
        return redirect()->back();
        }
    }

    // district edit //
    public function DistrictEdit($id){

        $districts = ShipDistrict::find($id);
        $divisions = Ship_division::orderBy('division_name','ASC')->get();
        return view('BackEnd.district.edit_district', compact('districts','divisions'));
    } // end method

    // district update //
    public function DistrictUpdate(Request $request, $id){

        $this->validate($request,[
            'district_name' => 'required',
            'division_id' => 'required'
        ]);

        ShipDistrict::findOrFail($id)->update([
            'district_name' =>$request->district_name,
            'division_id' => $request->division_id,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success','District Updated Successfully');
        return redirect()->route('manage.district');

    } // end method

    // district delete //
    public function DistrictDelete($id){

        ShipDistrict::findOrFail($id)->delete();
        Session::flash('info','District Deleted Successfully');
        return redirect()->back();
    }

    // district active //
    public function Districtactive($id){
        $district = ShipDistrict::find($id);
        $district->status = 1;
        $district->save();

        Session::flash('success','Successfully District Changed.');
        return redirect()->back();
    }

    // district inactive //
    public function Districtinactive($id){
        $district = ShipDistrict::find($id);
        $district->status = 0;
        $district->save();

        Session::flash('success','Successfully District Changed.');
        return redirect()->back();
    }
    // ==================== END SHIP DISTRICT ================== //

    // ==================== START SHIP STATE ================== //
    //division view
    public function StateView(){

        $divisions = Ship_Division::orderBy('division_name','ASC')->get();
        $districts = ShipDistrict::orderBy('district_name','ASC')->get();
        $state = ShipState::orderBy('id','DESC')->get();
        return view('BackEnd.state.view_state', compact('divisions','districts','state',));
    }

    // start ajax division with district //
    public function Getdivision($division_id){

        $district = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($district);
    }
    // end ajax division with district //

    // state store //
    public function StateStore(Request $request)
    {
        $this->validate($request,[
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name' => 'required'
        ]);


        $state = ShipState::where('state_name',$request->state_name)->first();

        if($state){
            Session::flash('warning','State already Created.');
            return redirect()->back(); 
        }else{
            $state = ShipState::insert([
            'state_name' =>$request->state_name,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success','State Inserted Successfully.');
        return redirect()->back();
        }
    }

    // State edit //
    public function StateEdit($id){

        $states = ShipState::find($id);
        $divisions = Ship_division::orderBy('division_name','ASC')->get();
        $districts = ShipDistrict::orderBy('district_name','ASC')->get();

        return view('BackEnd.state.edit_state', compact('states','divisions','districts'));
    } // end method

    // state update //
    public function StateUpdate(Request $request, $id){

        $this->validate($request,[
            'state_name' => 'required',
            'division_id' => 'required',
            'district_id' => 'required'
        ]);

        ShipState::findOrFail($id)->update([
            'state_name' =>$request->state_name,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success','State Updated Successfully');
        return redirect()->route('manage.state');

    } // end method 

    // state delete //
    public function StateDelete($id){

        ShipState::findOrFail($id)->delete();
        Session::flash('info','State Deleted Successfully');
        return redirect()->back();
    }

    // state active //
    public function Stateactive($id){
        $state = ShipState::find($id);
        $state->status = 1;
        $state->save();

        Session::flash('success','Successfully State Changed.');
        return redirect()->back();
    }

    // state inactive //
    public function Stateinactive($id){
        $state = ShipState::find($id);
        $state->status = 0;
        $state->save();

        Session::flash('success','Successfully State Changed.');
        return redirect()->back();
    }

    // ==================== END SHIP STATE ================== //StateStore
}
