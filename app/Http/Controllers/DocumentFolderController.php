<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentFolder;
use App\Models\Document;
use App\Models\UserLog;
use Auth;
use Illuminate\Support\Str;

class DocumentFolderController extends Controller
{
    private $_app = "";
    private $_page = "pages.document_folders.";
    private $_data = [];

    public function _construct()
    {
       
    }

    public function index()
    {
        $this->_data['documentFolders'] = DocumentFolder::all();
        return view($this->_page.'index',$this->_data);
    }

    public function create()
    {
        return view($this->_page.'create',$this->_data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        
        $data = $request->except('_token');
        $documentFolder = new DocumentFolder();
        $documentFolder->name = $data['name'];
        $documentFolder->descriptions = $data['descriptions'];
        $documentFolder->folder = $data['name'];
       
        if ($documentFolder->save()) {
            $this->addToLog("Add",$documentFolder->name);
            return redirect()->route('document_folders.index')->with('success', 'Your Document Folder has been Added .');
        }
        return redirect()->back()->with('fail', 'Information could not be added .');
    }

    public function edit($id)
    {
        $this->_data['data'] = DocumentFolder::find($id);
        return view($this->_page.'edit',$this->_data);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = $request->input();
        $documentFolder = DocumentFolder::findOrFail($id);
        $documentFolder->fill($data);
        if ($documentFolder->save()){
            $this->addToLog("Update",$data['name']);
            return redirect()->route('document_folders.index')->with('success', 'Your Information has been Updated .');
        }
        return redirect()->back()->with('fail', 'Information could not be added .');
    }

    public function delete($id)
    {   
        $document = Document::all()->where('document_folder_id',$id);
        foreach($document as $doc){
            $doc->delete();
        }
        $documentFolder = DocumentFolder::findOrFail($id);
        if ($documentFolder->delete()){
            return redirect()->route('document_folders.index')->with('success', 'Your Information has been deleted .');
        }
        return redirect()->back()->with('fail', 'Information could not be deleted .');
    }

    public function addToLog($activity,$docName) {
        $log = new UserLog();
        $log->user_id = Auth::id();
        $log->activity = $activity;
        $description = ($activity == "Add") ? "added" : "updated";
        $log->description = $docName.' named folder has been '.$description;
        $log->save();
    }
}
