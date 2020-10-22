@extends('backend/layout.master')
@section('title', 'carts list')
@section('content')

<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Carts List
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                          <tr class="danger">
                            <th>name</th>
                            <th>brand</th>
                            <th>caterogy</th>
                            <th>price</th>
                            <th>image</th>
                            <th>Quantity</th>
                            <th colspan="2"></th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                  <div class="row">
                    <div class="col-sm-7 text-right text-center-xs">  
                      <ul class="pagination pagination-sm m-t-none m-b-none">
                          links
                      </ul>
                    </div>
                  </div>
                </footer>
            </div>
        </div>
    </section>
</section>

@endsection