 <?php if(session()->has('success')): ?>
     <div class="alert alert-success">
         <?php echo e(session()->get('success')); ?>

     </div>
 <?php endif; ?>

 <?php if(session()->has('error')): ?>
     <div class="alert alert-danger">
         <?php echo e(session()->get('error')); ?>

     </div>
 <?php endif; ?>


 <div class="table-responsive">
     <table class="table">
         <thead>
             <tr>
                 <th width="5%" scope="col">#</th>
                 <th width="12%" scope="col">Blood Group</th>
                 <th scope="col">Location</th>
                 <th width="8%" scope="col">Date</th>
                 <th width="8%" scope="col">Time</th>
                 <th width="8%" scope="col">Flag</th>
                 <th width="8%" scope="col">Receiver Name</th>
                 <th width="8%" scope="col">Phone</th>
                 <th width="8%" scope="col">Email</th>
                 <th width="10%" scope="col">Status</th>
                 <th width="10%" scope="col">Action</th>
             </tr>
         </thead>
         <tbody>
             <?php $__currentLoopData = $interested_in; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                     <th width="5%" scope="row"><?php echo e($index + 1); ?></th>
                     <td width="12%">
                         <?php echo e(\App\Models\BloodGroup::where(['id' => $data->blood_group_id])->first()->name); ?>

                     </td>

                     <td><?php echo e($data->location); ?></td>
                     <td width="8%"><?php echo e($data->date); ?></td>
                     <td width="8%"><?php echo e($data->time); ?></td>
                     <td width="8%"><span class="badge <?php echo e($data->flag === 'urgent' ? 'bg-danger' : 'bg-success'); ?>">
                             <?php echo e($data->flag === 'urgent' ? 'Urgent' : 'Pre Collection'); ?>

                         </span></td>
                     <td width="8%"><?php echo e($data->name); ?></td>
                     <td width="8%"><?php echo e($data->phone); ?></td>
                     <td width="8%"><?php echo e($data->email); ?></td>
                     <td width="8%"><span class="badge <?php echo e($data->accepted ? 'bg-success' : 'bg-warning'); ?>">
                             <?php echo e($data->accepted ? 'Accepted' : 'Pending'); ?>

                         </span></td>
                     <td width="10%">
                         <div>
                             <button class="btn btn-danger request-accept" data-bs-toggle="modal"
                                 data-bs-target="#request_cancel_modal<?php echo e($data->id); ?>"
                                 request_id="<?php echo e($data->id); ?>" <?php echo e($data->accepted ? 'disabled' : ''); ?>>
                                 Cancel
                             </button>
                         </div>

                         <div id="request_cancel_modal<?php echo e($data->id); ?>" class="modal fade" tabindex="-1"
                             role="dialog" aria-hidden="true">
                             <div class="modal-dialog modal-dialog-centered" role="document">
                                 <div class="modal-content border-0">
                                     <div class="modal-body p-0">
                                         <div class="card border-0 p-sm-3 p-2 justify-content-center">
                                             <div class="card-header pb-0 bg-white border-0 ">
                                                 <h4 class="font-weight-bold mb-2"> Are you sure you wanna cancel this
                                                     request?</h4>
                                             </div>
                                             <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                                                 <div class="row justify-content-end no-gutters">
                                                     <div class="col-auto"><button type="button"
                                                             class="btn btn-light text-muted"
                                                             data-bs-dismiss="modal">Cancel</button></div>
                                                     <div class="col-auto">
                                                         <form
                                                             action="<?php echo e(route('donor.cancel_blood_request', $data->id)); ?>"
                                                             method="post">
                                                             <?php echo csrf_field(); ?>
                                                             <button type="submit" class="btn btn-danger px-4"
                                                                 data-dismiss="modal">Yes</button>
                                                         </form>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </td>
                 </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
     </table>



     



     <!-- Modal -->
     <div class="modal fade interestedDonorModal" tabindex="-1" aria-labelledby="interestedDonorsModalLabel"
         aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="interestedDonorsModalLabel">Interested Donors</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                 </div>
                 <div class="modal-body">
                     <div>
                         <div class="loader mx-auto"></div>
                         <div class="interested-donors table-responsive">
                             <table class="table">
                                 <thead>
                                     <tr>
                                         <th scope="col">#</th>
                                         <th scope="col">Name</th>
                                         <th scope="col">Phone</th>
                                         <th scope="col">Email</th>
                                         <th scope="col">Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                 </tbody>
                             </table>
                         </div>
                         <div class="not-found text-center py-3 d-none">
                             <h3>No Interested Donors Found!</h3>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                         data-bs-dismiss="modal">Close</button>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <?php $__env->startSection('script'); ?>
     <script>
         $(document).ready(function() {
             // get all interested donors by id 

             $('.interestedDonors').on('click', function() {
                 let bloodRequestId = $(this).attr('request_id');
                 $.ajax({
                     url: `blood-request/${bloodRequestId}/interested-donors`,
                     type: 'GET',
                     beforeSend: function() {
                         $('.loader').show();
                         $('.interested-donors').hide();
                         $('.not-found').hide();
                     },
                     success: function(result) {
                         $('.loader').hide();

                         console.log('====================================');
                         console.log(result?.data);
                         console.log('====================================');

                         if (result?.data?.length) {
                             let html = '';
                             result?.data?.forEach(function(element, index) {
                                 console.log(element.accepted);
                                 html += `
                                 <tr>
                                    <th scope="row">${index + 1}</th>
                                    <td>${element.donor_name}</td>
                                    <td>${element.donor_phone}</td>
                                    <td>${element.donor_email}</td>
                                    <td>
                                        <button interested-id="${element.id}" blood-request-id="${element.blood_request_id}" donor-id="${element.interested_donor_id}" class="btn btn-primary accept-interested-donors" ${element.accepted ? 'disabled' : ''}>
                                            ${element.accepted ? 'Accepted' : 'Accept'}
                                            </button>
                                            </td>
                                            </tr>
                                            `;
                             });
                             $('.interested-donors').show();
                             $('.interested-donors table tbody').html(html);
                         } else {
                             $('.not-found').attr('style', 'display:block !important');
                         }

                     },
                     error: function() {
                         alert('Something went wrong');
                     }
                 });
             });


             $('.interested-donors').on('click', '.accept-interested-donors', function() {

                 let acceptBtn = $(this);
                 let bloodRequestId = $(this).attr('blood-request-id');
                 let donorId = $(this).attr('donor-id');
                 let interestedId = $(this).attr('interested-id');



                 $.ajax({
                     url: `blood-request/accept-donor`,
                     type: 'POST',
                     headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
                     data: {
                         _token: $('meta[name="csrf-token"]').attr('content'),
                         bloodRequestId,
                         donorId
                     },
                     beforeSend: function() {
                         console.log(acceptBtn);
                         acceptBtn.text('Accepting...');
                     },
                     success: function(result) {
                         if (result.success) {
                             acceptBtn.text('Accepted');
                             acceptBtn.attr('disabled', 'disabled');
                         } else {
                             acceptBtn.text('Accept');
                         }
                     },
                     error: function(err) {
                         console.log(err);
                         //  location.reload();
                         acceptBtn.text('Accept');
                     }
                 });


             });




             // Delete Blood Request

             let blood_request_id;

             $('.delete-a-request').click(function() {
                 blood_request_id = $(this).attr('request_id');
             });



             $('#delete_blood_request_btn').click(function() {
                 $.ajax({
                     url: `reciever/blood-request/${blood_request_id}/delete`,
                     type: 'GET',
                     beforeSend: function() {
                         $('#delete_blood_request_btn').text('Deleting...');
                     },
                     success: function(result) {
                         location.reload();
                     },
                     error: function() {
                         alert('Something went wrong');
                         location.reload();
                     }
                 });
             });

         })
     </script>
 <?php $__env->stopSection(); ?>
<?php /**PATH E:\Freelance Projects\blood-donation-hub\resources\views/frontend/user/donor/blood_requets_table.blade.php ENDPATH**/ ?>