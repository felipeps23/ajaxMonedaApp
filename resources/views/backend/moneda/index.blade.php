@extends('backend.base')



@section('content')

<div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="AddModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddModalLabel">Add moneda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addMonedaForm">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="name">Coin name</label>
                <input type="text" minlength="2" maxlength="40" required value="" name="name" class="form-control" id="name"  placeholder="Coin name">
              </div>
              <div class="form-group">
                <label for="symbol">Coin symbol</label>
                <input type="text" minlength="1" maxlength="3" required value="" name="symbol" class="form-control" id="symbol" placeholder="Coin symbol">
              </div>
              <div class="form-group">
                <label for="country">Country</label>
                <input type="text" maxlength="100" maxlength="3" required value="" name="country" class="form-control" id="country" placeholder="Country">
                </div>
            
              <div class="form-group">
                <label for="value (€)">Value</label>
                <input type="number" step="0.001" minlength="3" maxlength="60" required value="" name="value" class="form-control" id="value" placeholder="Value">
              </div>
              <div class="form-group">
                <label for="date">Date</label>
                <input required type="date" class="form-control" value="" name="date" id="date" placeholder="Date"></input>
              </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="AddMoneda" class="btn btn-primary">Add moneda</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="EditModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditModalLabel">Edit moneda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editMonedaForm">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="name">Coin name</label>
                <input type="text" minlength="2" maxlength="40" required value="" name="name" class="form-control" id="nameEdit"  placeholder="Coin name">
              </div>
              <div class="form-group">
                <label for="symbol">Coin symbol</label>
                <input type="text" minlength="1" maxlength="3" required value="" name="symbol" class="form-control" id="symbolEdit" placeholder="Coin symbol">
              </div>
              <div class="form-group">
                <label for="country">Country</label>
                <input type="text" maxlength="100" maxlength="3" required value="" name="country" class="form-control" id="countryEdit" placeholder="Country">
                </div>
            
              <div class="form-group">
                <label for="value (€)">Value</label>
                <input type="number" step="0.001" minlength="3" maxlength="60" required value="" name="value" class="form-control" id="valueEdit" placeholder="Value">
              </div>
              <div class="form-group">
                <label for="date">Date</label>
                <input required type="date" class="form-control" value="" name="date" id="dateEdit" placeholder="Date"></input>
              </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="EditMoneda" class="btn btn-primary">Edit moneda</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="DeletetModalLabel">Delete moneda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          ¿Seguro que quiere borrar la moneda <span id="nameBorrar"></span>?
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="DeleteMoneda" class="btn btn-primary">Delete moneda</button>
      </div>
    </div>
  </div>
</div>


    
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            
            <div class="card-body">            
                <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#AddModal">Create coin</buton>
            </div>
        </div>
    </div>
</div>

<table class="table table-hover">
              <thead>
                <th scope="col">#Id</th>
                <th scope="col">Name</th>
                <th scope="col">Symbol</th>
                <th scope="col">Country</th>
                <th scope="col">Value</th>
                <th scope="col">Date</th>
                
                <th scope="col">Show</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </thead>            
            <tbody id="tbody">
                               
            </tbody>            
        </table>
        <div class="row">
    <div class="col-lg-6" >
        <nav>
           <ul class="pagination" id="enlacesPaginacion">
           </ul>
        </nav>
    </div>
    <div class="col-lg-5">
        <div class="float-right">
            <label for="selectRows">Rows in each page: </label>
            <select name="rows" class="form-control" id="selectRows">
                <option >2</option>
                <option >3</option>
                <option >5</option>
                <option selected>10</option>
            </select>
        </div>
    </div>
</div>
@endsection

@section('poststyle')
<link rel="stylesheet" href="{{ url('assets/backend/css/moneda.css') }}">
@endsection

@section('postscript')
<script src="{{ url('assets/backend/js/moneda.js?r=' . uniqid()) }}"></script>
@endsection



