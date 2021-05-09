@extends('admin.admin_master')
@section('admin')

<div class="content-wrapper">
    <div class="container-full">
    
<section class="content">
    <div class="row">
            
    <div class="col-12">

        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Student Fee Amount Details</h3>
            <a href="{{route('fee.amount.add')}}" style="float:right;" class="btn btn-rounded btn-success mb-5"> Add Fee Amount</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <h4><strong>Fee Category : </strong>{{$detailsData['0']['fee_category']['name']}}</h4>
            <div class="table-responsive">
                <table  class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th width="5%">SL</th>
                        <th>Class Name</th>
                        <th width="25%">Amount</th>
                       
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailsData as $key=>$details)
                    <tr>
                        <td>{{$key+1}}</td>
                       
                        <td>{{$details['student_class']['name']}}</td>
                   
                        <td>{{$details->amount}} </td>
                        
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                   
                </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        </div>
            
    </div>
</div>
</section>
</div>
</div>


@endsection