@extends('layouts.app')

@section('title', 'Invoice')
    
@section('content')

{{-- Form to making POS inovice --}}

<div class="h3 text-center">Create New Invoice</div>
{{-- <div style="display: grid; grid-template-columns"> --}}
    {{-- <div class="row"> --}}

        
        {{-- <div class="col"> --}}
        
    <div style="width:85%; margin: auto">
        <form action="{{route('saleInvoice.store')}}" method="POST">

    @csrf
    
    <div class="h4">Customer Details</div>
    <hr>
    
    <div class="table-responsive">
        
        <table class="table table-bordered" width="100%" cellspacing="0">
            <tr>
                <td>
                    <label for="formGroupExampleInput"><b>Patient Name</b></label>
                    <input class="form-control" type="text" name="customerName" id="customerName" autofocus required >
                </td>
                
                <td>
                    <label for="formGroupExampleInput"><b>Patient Age</b></label>
                    <input class="form-control" min="1" oninput ="this.value = Math.abs(this.value)" type="number" name="customerAge" id="customerAge" required autofocus>
                </td>
            {{-- </tr> --}}
            
            {{-- <tr> --}}
                {{-- <td>
                    <label for="formGroupExampleInput"><b>Patient Gender</b></label>
                    <select id="customerGender" class="form-control" name="customerGender" autofocus required >
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
            </td> --}}
            {{-- <td>
                <label for="formGroupExampleInput"><b>Patient Contact</b></label> 
                <input class="form-control" type="text" name="customerContact" id="customerContact" autofocus required >
            </td> --}}
        </tr>
    </tbody>
</table>
<hr> <br>

    <div class="h4">Prescription Details</div>
    <hr>
    
    <div class="table-responsive">
        
        <table class="table table-bordered" width="100%" cellspacing="0">
            <tr>
                <td>
                    <label for="formGroupExampleInput"><b>Prescribed by</b></label>
                    <input class="form-control" type="text" name="prescriptionPrescribedBy" id="prescriptionPrescribedBy" autofocus required>
                </td>
                
                <td>
                    <label for="formGroupExampleInput"><b>Disease</b></label>
                    <input class="form-control" type="text" name="prescriptionDisease" id="prescriptionDisease" autofocus required>
                </td>
            </tr>
            
    </tbody>
</table>
<hr> <br>

<div class="h4">Medicines Invoice:</div> <br>

<div class="table-responsive">
    <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>S#</th>
                <th class="w-25">Medicine Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>
                    <a href="#!" title="Add New Row" class="btn btn-sm btn-success add_more"><i class="fa fa-plus"></i></a>
                </th>
            </tr>
        </thead>
        <tbody class="addMoreMedicine">
            <tr>
                <td class="serial_no">{{$serial++}}.</td>
                <td>
                    <select class="form-control medicine_id" id="medicineName" name="medicine_id[]" required autofocus>
                        <option value="">Select Medicine</option>
                        @foreach ($medicines as $medicine)
                        <option data-price="{{$medicine->medicine_price}}" value="{{$medicine->medicine_id}}">
                            {{$medicine->medicine_name}} ({{$medicine->medicine_dose}})
                        </option>
                        @endforeach
                    </select>
                </td>
                    <td>
                        <input class="form-control quantity" type="number" name="quantity[]" id="qunatity" min="1" oninput ="this.value = Math.abs(this.value)" required autofocus>
                    </td>
                    <td>
                        <input class="form-control price" type="number" name="price[]" id="price" readonly>
                    </td>
                    <td>
                        <input class="form-control total" type="number" name="total[]" id="total" readonly>
                    </td>
                    <td>
                        {{-- <a href="#" title="Remove row" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a> --}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- <input type="button" value="Finish" id="btn" class="btn btn-primary"> --}}

    <br><br><br>

    {{-- </div> --}}
    
    {{-- Payment Panel --}}
        {{-- <div class="container"> --}}
            <div class="card">
                <div class="card-header">
                    <h5>Payment Reciept</h5>
                </div>
                <div class="card-body">
                    <h4>Total Amount: 
                        <input type="number" name="TransactionBill" style="border: none; background-color: transparent; font-weight:bold;" class="total_amount" placeholder="0.00" readonly>
                    </h4>
                    <hr>
                    <h5>Payment Method</h5>
                    <span class="radio-item">
                    <input type="radio" value="Cash" name="payment_method" checked>
                    <i class="fa fa-solid fa-money-bill text-success"></i>
                    Cash &nbsp; &nbsp;
                </span>
                <span class="radio-item">
                    <input type="radio" value="Credit Card" name="payment_method">
                    <i class="fa fa-solid fa-credit-card"></i>
                    Credit Card
                </span>
                </div>
                <div class="card-footer">
                    <input type="button" value="Finish" id="btn" class="btn btn-primary">
                </div>
            </div>

                <!-- Large modal -->

    <!-- Button trigger modal -->

  
        <!-- Modal -->
        <div class="modal fade myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Confirmation:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <p style="color: red"><i>*Please verify the patient details and medicine details carefully pefore proceeding.</i></p>
                    <div class="patient-detials">
                        <hr>
                        <h4>Patient Details</h4>
                        <hr>
                        <h6> Patient Name: <b id="FinalcustomerName"></b></h6>
                        <h6> Patient Age: <b id="FinalcustomerAge"></b></h6>
                        {{-- <h6> Patient Gender: <b id="FinalcustomerGender"></b></h6>
                        <h6> Patient Contact: <b id="FinalcustomerContact"></b></h6> --}}
                        <hr>
                        <h4>Prescription Details</h4>
                        <hr>
                        <h6> Prescription Precriber: <b id="FinalprescriptionPrescribedBy"></b></h6>
                        <h6> Prescription Disease: <b id="FinalprescriptionDisease"></b></h6>
                        <hr>
                    </div>
                    <div class="medicine-details">
                        <h4>Medicine Details</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <tbody class="medicinesPurchased">
                                    <tr>
                                        <th>
                                            <h6>S# </h6>
                                        </th>
                                        <th>
                                            <h6>Medicine Name</h6>
                                        </th>
                                        <th>
                                            <h6>Medicine Quantity</h6>
                                        </th>
                                    </tr>
                                    {{-- <script>
                                        // let medicines = [];
                                        // let medicinesQuantity = [];
    
                                        // var num=0;
    
                                        // console.log(num);
    
                                        // console.log(medicines.length);
                                        // console.log(typeof medicines);
                                        // console.log(medicines.length);
                                        // console.log(typeof medicinesQuantity);
    
                                    //     for(i = 0; i < medicines.length; i++){
                                    //         document.write('<tr>');
                                    //             document.write('<td>')
                                    //                 document.write(medicines[i])
                                    //             document.write('</td>')
    
                                    //             document.write('<td>')
                                    //                 document.write(medicinesQuantity[i])
                                    //             document.write('</td>')
                                    //         document.write('</tr>')
                                    //     }
                                    // </script> --}}
                                </tbody>
                                    <tfoot>
                                        <tr style="text-align: right">
                                            <td colspan="3">
                                                Subtotal: 
                                                <input type="number" style="border: none; background-color: transparent; font-weight:bold;" class="total_amount" placeholder="0.00" readonly>
                                            </td>
                                        </tr>
                                    </tfoot>

                            </table>
                            <hr>
                            <h5>Payment Details: </h5>
                            <hr>
                            <label>
                                Payment:
                            </label>
                            <input type="number" name="paid_amount" id="paid_amount" class="form-control" required>

                            <label>
                                Change:
                            </label>
                            <input type="number" class="form-control change" readonly>
                        </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Confirm" onclick="window.print()">
                    {{-- onclick="window.print();" --}}
                    <input type="button" class="btn btn-secondary" value="Cancel" id="cancel">
                </div>
            </div>
            </div>
        </div>
        </form>
    </div>
        {{-- </div> --}}
    {{-- </div> --}}
{{-- </div> --}}

@endsection
@section('script')
    
<script>
    // $(document).ready(function(){
    //     // alert('hello');
    // })

    // Add a new row
    $('.add_more').on('click', function() {
                var medicines = $('.medicine_id').html(); 

                // var serial = $('.serial_no').html();

                // serial+1;

                var numberofrow = ($('.addMoreMedicine tr').length - 0) + 1;

                // var numberofrow = ($('.addMoreProduct tr').length - 0) + 1; 
                var tr = '<tr><td>'+ numberofrow +'.</td>'+
                '<td><select class="form-control medicine_id" name="medicine_id[]" >' + medicines +' </select></td>' + '<td> <input type="number" name="quantity[]" id="qunatity" min="1" oninput ="this.value = Math.abs(this.value)" class="form-control quantity"></td>' + 
                '<td> <input type ="number" name="price[]" class="form-control price" readonly></td>' + 
                '<td> <input type ="number" name="total[]" class="form-control total" id="total" readonly></td>' +
                '<td> <a title="Remove row" class="btn btn-sm btn-danger delete"><i class="fa fa-times"></i></a></td></tr>';

                $('.addMoreMedicine').append(tr);
    });

    // Delete the new row
    $('.addMoreMedicine').delegate('.delete', 'click', function(){
        $(this).parent().parent().remove();

        // updating the total if the new row is deleted
        // let total = $('.total_amount').html();
        let total = $('.total_amount').val();

        var tr = $(this).parent().parent(); 

        let totalofDeletedRow = tr.find('.total').val() - 0;

        let newTotal = total - totalofDeletedRow;

        // $('.total_amount').html(newTotal)
        $('.total_amount').val(newTotal)
    })

    // Change the total input field
    function TotalAmount(){
        let total = 0;
        // let amount;
        $('.total').each(function(i,e){
            // console.log($(this).val());
            let amount = $(this).val() - 0;
            // let amount = parseInt(document.getElementById('total').value);
            // console.log(amount);
            total+=amount;
            // console.log(total);
        })

        // console.log(total);

        // $('.total_amount').html(total);
        $('.total_amount').val(total);

        // total = parseInt(total);

        // console.log(total);

        // document.getElementById('total_amount').innerHTML = total
    }

    // Retrieving the medicine price and showing in the price input field when the medicine is selected from the list
    $('.addMoreMedicine').delegate('.medicine_id', 'change', function() {
            var tr = $(this).parent().parent(); 

            var price = tr.find('.medicine_id option:selected').attr('data-price');

            tr.find('.price').val(price);

            var qty = tr.find('.quantity').val() - 0;

            var price = tr.find('.price').val() - 0; 

            // console.log(price);

            var total = qty * price; 
            tr.find('.total').val(total); 

            TotalAmount();
    });

    // Changing the total when the quantity of the medicine is increased or decreased
    $('.addMoreMedicine').delegate('.quantity', 'keyup', function(){
            var tr = $(this).parent().parent(); 

            var qty = tr.find('.quantity').val() - 0; 

            var price = tr.find('.price').val() - 0; 

            var total = qty * price; 
            tr.find('.total').val(total); 

            TotalAmount();

    });

    // Showing the pop up confirmation when the finish button is clicked
    var btn  = document.getElementById("btn");
    btn.addEventListener('click', function validateForm() {
        $('.myModal').modal('show');
        // Take values of patient and show in popup modal using js

        document.getElementById('FinalcustomerName').innerHTML = document.getElementById('customerName').value;
        document.getElementById('FinalcustomerAge').innerHTML = parseInt(document.getElementById('customerAge').value);
        // document.getElementById('FinalcustomerGender').innerHTML = document.getElementById('customerGender').value;
        // document.getElementById('FinalcustomerContact').innerHTML = document.getElementById('customerContact').value;
        document.getElementById('FinalprescriptionPrescribedBy').innerHTML = document.getElementById('prescriptionPrescribedBy').value;
        document.getElementById('FinalprescriptionDisease').innerHTML = document.getElementById('prescriptionDisease').value;

        // Taking the medicine values

        // let medicineNames = [];
        
        // document.getElementById('medicineName').value.forEach(element => {
        //     medicineNames.push()
        // });
        // console.log(medicineNames)

        // adding medicines in the list
        // let medicineNames = [];
        // let newMedicine;
        // $('.medicine_id').each(function(i,e){
        //     newMedicine = document.getElementById('medicineName').attr('data-value');
        //     console.log(newMedicine);
        //     medicineNames.push(newMedicine);
        //     console.log(medicineNames);
        // })

        // document.getElementById('finalMedicineName').value = medicineNames;

        // consol

        // For each row take the medicines name and quantity and display in the final bill table above
        $('.addMoreMedicine tr').each(function(i,e){
            // var tr = $(this).parent().parent(); 
            // console.log('here');
            var tr = $(this); 

            let qty = tr.find('.quantity').val() - 0;

            let name = tr.find('.medicine_id option:selected').html(); 

            name = name.trim();

            // medicinesQuantity.push(qty);

            // medicines.push(name);

            // console.log(medicines);
            // console.log(medicinesQuantity);

            // console.log(name);
            // console.log(qty);

            // console.log(medicines.length);
            // console.log(medicinesQuantity.length);

                var numberofrow = $('.medicinesPurchased tr').length - 0;

                // var numberofrow = ($('.addMoreProduct tr').length - 0) + 1; 
                var row = '<tr><td>'+ numberofrow +'.</td>'+
                '<td>'+name+'</td>'+ 
                '<td>'+qty+ '</td></tr>';

                // console.log('here')

                console.log(row);
                // $('.medicinesList').append(tr);

                // let num=2;

                $('.medicinesPurchased').append(row);
            
        })
        
    });
    // num=10;

    // console.log(num)

    // To close the popup when cancel button is pressed
    var cancelBtn  = document.getElementById("cancel");
    cancelBtn.addEventListener('click', function validateForm() {
        $('.myModal').modal('hide');
    });

    // For displaying change of the paid amount
    $('#paid_amount').keyup(function(){
        // alert();

        let total = $('.total_amount').val();

        let paidAmount = $(this).val();

        let change = paidAmount - total;

        $('.change').val(change);
    })

</script>
    @endsection