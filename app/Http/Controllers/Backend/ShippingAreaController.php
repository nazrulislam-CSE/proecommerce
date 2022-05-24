<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Carbon\Carbon;
use Session;

class ShippingAreaController extends Controller
{
    /*=================== Start DivisionView Methoed ===================*/
     public function DivisionView(){

        $divisions = ShipDivision::orderBy('id','DESC')->get();
        return view('BackEnd.division.view_division', compact('divisions'));
    }
    /*=================== End DivisionView Methoed =====================*/

    /*=================== Start DivisionStore Methoed ===================*/
    public function DivisionStore(Request $request)
    {
        $this->validate($request,[
            'division_name' => 'required',
        ]);


        $division = ShipDivision::where('division_name',$request->division_name)->first();

        if($division){
            Session::flash('warning','Division already Created.');
            return redirect()->back(); 
        }else{
            $division = ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success','Division Inserted Successfully.');
        return redirect()->back();
        }
    }
    /*=================== End DivisionStore Methoed =====================*/

    /*=================== Start  DivisionEidt Methoed =====================*/
    public function DivisionEdit($id){

        $divisions = ShipDivision::find($id);
        return view('BackEnd.division.edit_division', compact('divisions'));
    }
    /*=================== End  DivisionEidt Methoed =======================*/

    /*=================== Start  DivisionUpdate Methoed ===================*/
    public function DivisionUpdate(Request $request, $id){

        $this->validate($request,[
            'division_name' => 'required',
        ]);

        ShipDivision::findOrFail($id)->update([
            'division_name' =>$request->division_name,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success','Division Updated Successfully');
        return redirect()->route('manage.division');

    }
    /*=================== End  DivisionUpdate Methoed =====================*/

    /*=================== Start  DivisionDelete Methoed ===================*/
    public function DivisionDelete($id){

        ShipDivision::findOrFail($id)->delete();
        Session::flash('info','Division Deleted Successfully');
        return redirect()->back();
    }

    /*=================== End  DivisionDelete Methoed =====================*/

    /*=================== Start Division Active/Inactive Methoed ===================*/
     public function divisionactive($id){
        $division = ShipDivision::find($id);
        $division->status = 1;
        $division->save();

        Session::flash('success','Successfully Division Changed.');
        return redirect()->back();
    }

    public function divisioninactive($id){
        $division = ShipDivision::find($id);
        $division->status = 0;
        $division->save();

        Session::flash('success','Successfully Division Changed.');
        return redirect()->back();
    }
    /*=================== End Division Active/Inactive Methoed =====================*/

    /*=================== Start DistrictView Methoed ===================*/
    public function DistrictView(){

        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::with('division')->orderBy('id','DESC')->get(); // division realtion name ta //
        return view('BackEnd.district.view_district', compact('district','divisions'));
    }

    /*=================== End DistrictView Methoed =====================*/

    /*=================== Start DistrictStore Methoed ===================*/
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
    /*=================== End DistrictStore Methoed =====================*/

    /*=================== Start DistrictEdit Methoed =====================*/
    public function DistrictEdit($id){

        $districts = ShipDistrict::find($id);
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        return view('BackEnd.district.edit_district', compact('districts','divisions'));
    } // end method
    /*=================== End DistrictEdit Methoed =======================*/

    /*=================== Start DistrictUpdate Methoed ===================*/
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

    /*=================== End DistrictUpdate Methoed =====================*/
    
    /*=================== Start  DistrictDelete Methoed ===================*/
    public function DistrictDelete($id){

        ShipDistrict::findOrFail($id)->delete();
        Session::flash('info','District Deleted Successfully');
        return redirect()->back();
    }
    /*=================== End  DistrictDelete Methoed =====================*/


    /*=================== Start Division Active/Inactive Methoed ===================*/
    public function Districtactive($id){
        $district = ShipDistrict::find($id);
        $district->status = 1;
        $district->save();

        Session::flash('success','Successfully District Changed.');
        return redirect()->back();
    }

    public function Districtinactive($id){
        $district = ShipDistrict::find($id);
        $district->status = 0;
        $district->save();

        Session::flash('success','Successfully District Changed.');
        return redirect()->back();
    }
    /*=================== End Division Active/Inactive Methoed =====================*/

    /*=================== Start StateView Methoed ===================*/
    public function StateView(){

        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $districts = ShipDistrict::orderBy('district_name','ASC')->get();
        $state = ShipState::orderBy('id','DESC')->get();
        return view('BackEnd.state.view_state', compact('divisions','districts','state',));
    }
    /*=================== End StateView Methoed =====================*/

    /*=================== Start Ajax Dvivision With Distric Show ========================*/
    public function Getdivision($division_id){

        $district = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($district);
    }
    /*=================== End Start Ajax Dvivision With Distric Show=====================*/

    /*=================== Start StateStore Methoed ===================*/
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

    /*=================== End StateStore Methoed =====================*/

    /*=================== Start StateEdit Methoed =====================*/
    public function StateEdit($id){

        $states = ShipState::find($id);
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $districts = ShipDistrict::orderBy('district_name','ASC')->get();

        return view('BackEnd.state.edit_state', compact('states','divisions','districts'));
    } // end method
    /*=================== End StateEdit Methoed =======================*/

    /*=================== Start StateUpdate Methoed ===================*/
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
    /*=================== End StateUpdate Methoed =====================*/

    /*=================== Start  DistrictDelete Methoed ===================*/
    public function StateDelete($id){

        ShipState::findOrFail($id)->delete();
        Session::flash('info','State Deleted Successfully');
        return redirect()->back();
    }
    /*=================== End  DistrictDelete Methoed =====================*/

    /*=================== Start Division Active/Inactive Methoed ===================*/
    public function Stateactive($id){
        $state = ShipState::find($id);
        $state->status = 1;
        $state->save();

        Session::flash('success','Successfully State Changed.');
        return redirect()->back();
    }

    public function Stateinactive($id){
        $state = ShipState::find($id);
        $state->status = 0;
        $state->save();

        Session::flash('success','Successfully State Changed.');
        return redirect()->back();
    }
    /*=================== End Division Active/Inactive Methoed =====================*/
}
