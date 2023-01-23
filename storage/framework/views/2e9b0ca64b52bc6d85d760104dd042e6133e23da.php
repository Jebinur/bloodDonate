 <?php if(session()->has('success')): ?>
     <div class="alert alert-success">
         <?php echo e(session()->get('success')); ?>

     </div>
 <?php endif; ?>


 <div class="table-responsive">
     <table class="table" id="blood_request_table">
         <thead>
             <tr>
                 <th width="5%" scope="col">#</th>
                 <th width="12%" scope="col">Blood Group</th>
                 <th scope="col">Location</th>
                 <th width="8%" scope="col">Date</th>
                 <th width="8%" scope="col">Time</th>
                 <th width="8%" scope="col">Flag</th>
                 <th width="10%" scope="col">Can See By</th>
                 <th width="5%" scope="col">Managed</th>
                 <th width="5%" scope="col">Interested Donors</th>
                 <th width="10%" scope="col">Action</th>
             </tr>
         </thead>
         <tbody>
             <?php $__currentLoopData = $bloodRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <tr>
                     <th width="5%" scope="row"><?php echo e($index + 1); ?></th>
                     <td width="12%"><?php echo e($data->bloodGroup->name); ?></td>

                     <td><?php echo e($data->location); ?></td>
                     <td width="8%"><?php echo e($data->date); ?></td>
                     <td width="8%"><?php echo e($data->time); ?></td>
                     <td width="8%"><span class="badge <?php echo e($data->flag === 'urgent' ? 'bg-danger' : 'bg-success'); ?>">
                             <?php echo e($data->flag === 'urgent' ? 'Urgent' : 'Pre Collection'); ?>

                         </span></td>
                     <td width="10%">
                         <span class="badge <?php echo e($data->only_show_to_authorized ? 'bg-warning' : 'bg-success'); ?>">
                             <?php echo e($data->only_show_to_authorized ? 'Authorized Donors' : 'All Donors'); ?>

                         </span>
                     </td>
                     <td width="5%"><span class="badge <?php echo e($data->managed ? 'bg-success' : 'bg-warning'); ?>">
                             <button class="text-light" data-bs-toggle="modal"
                                 data-bs-target=".manageRequest<?php echo e($data->id); ?>">
                                 <?php echo e($data->managed ? 'Managed' : 'Not Managed'); ?>

                             </button>

                         </span></td>
                     <td width="10%">
                         <button type="button" class="btn btn-primary text-dark interestedDonors"
                             request_id="<?php echo e($data->id); ?>" data-bs-toggle="modal"
                             data-bs-target=".interestedDonorModal">Details</button>
                     </td>
                     <td width="10%">
                         <div>
                             <button class="delete-a-request" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                 request_id="<?php echo e($data->id); ?>">
                                 <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100"
                                     height="100" viewBox="0 0 100 100" style=" fill:#000000;">
                                     <path fill="#f37e98"
                                         d="M25,30l3.645,47.383C28.845,79.988,31.017,82,33.63,82h32.74c2.613,0,4.785-2.012,4.985-4.617L75,30">
                                     </path>
                                     <path fill="#f15b6c"
                                         d="M65 38v35c0 1.65-1.35 3-3 3s-3-1.35-3-3V38c0-1.65 1.35-3 3-3S65 36.35 65 38zM53 38v35c0 1.65-1.35 3-3 3s-3-1.35-3-3V38c0-1.65 1.35-3 3-3S53 36.35 53 38zM41 38v35c0 1.65-1.35 3-3 3s-3-1.35-3-3V38c0-1.65 1.35-3 3-3S41 36.35 41 38zM77 24h-4l-1.835-3.058C70.442 19.737 69.14 19 67.735 19h-35.47c-1.405 0-2.707.737-3.43 1.942L27 24h-4c-1.657 0-3 1.343-3 3s1.343 3 3 3h54c1.657 0 3-1.343 3-3S78.657 24 77 24z">
                                     </path>
                                     <path fill="#1f212b"
                                         d="M66.37 83H33.63c-3.116 0-5.744-2.434-5.982-5.54l-3.645-47.383 1.994-.154 3.645 47.384C29.801 79.378 31.553 81 33.63 81H66.37c2.077 0 3.829-1.622 3.988-3.692l3.645-47.385 1.994.154-3.645 47.384C72.113 80.566 69.485 83 66.37 83zM56 20c-.552 0-1-.447-1-1v-3c0-.552-.449-1-1-1h-8c-.551 0-1 .448-1 1v3c0 .553-.448 1-1 1s-1-.447-1-1v-3c0-1.654 1.346-3 3-3h8c1.654 0 3 1.346 3 3v3C57 19.553 56.552 20 56 20z">
                                     </path>
                                     <path fill="#1f212b"
                                         d="M77,31H23c-2.206,0-4-1.794-4-4s1.794-4,4-4h3.434l1.543-2.572C28.875,18.931,30.518,18,32.265,18h35.471c1.747,0,3.389,0.931,4.287,2.428L73.566,23H77c2.206,0,4,1.794,4,4S79.206,31,77,31z M23,25c-1.103,0-2,0.897-2,2s0.897,2,2,2h54c1.103,0,2-0.897,2-2s-0.897-2-2-2h-4c-0.351,0-0.677-0.185-0.857-0.485l-1.835-3.058C69.769,20.559,68.783,20,67.735,20H32.265c-1.048,0-2.033,0.559-2.572,1.457l-1.835,3.058C27.677,24.815,27.351,25,27,25H23z">
                                     </path>
                                     <path fill="#1f212b"
                                         d="M61.5 25h-36c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h36c.276 0 .5.224.5.5S61.776 25 61.5 25zM73.5 25h-5c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h5c.276 0 .5.224.5.5S73.776 25 73.5 25zM66.5 25h-2c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h2c.276 0 .5.224.5.5S66.776 25 66.5 25zM50 76c-1.654 0-3-1.346-3-3V38c0-1.654 1.346-3 3-3s3 1.346 3 3v25.5c0 .276-.224.5-.5.5S52 63.776 52 63.5V38c0-1.103-.897-2-2-2s-2 .897-2 2v35c0 1.103.897 2 2 2s2-.897 2-2v-3.5c0-.276.224-.5.5-.5s.5.224.5.5V73C53 74.654 51.654 76 50 76zM62 76c-1.654 0-3-1.346-3-3V47.5c0-.276.224-.5.5-.5s.5.224.5.5V73c0 1.103.897 2 2 2s2-.897 2-2V38c0-1.103-.897-2-2-2s-2 .897-2 2v1.5c0 .276-.224.5-.5.5S59 39.776 59 39.5V38c0-1.654 1.346-3 3-3s3 1.346 3 3v35C65 74.654 63.654 76 62 76z">
                                     </path>
                                     <path fill="#1f212b"
                                         d="M59.5 45c-.276 0-.5-.224-.5-.5v-2c0-.276.224-.5.5-.5s.5.224.5.5v2C60 44.776 59.776 45 59.5 45zM38 76c-1.654 0-3-1.346-3-3V38c0-1.654 1.346-3 3-3s3 1.346 3 3v35C41 74.654 39.654 76 38 76zM38 36c-1.103 0-2 .897-2 2v35c0 1.103.897 2 2 2s2-.897 2-2V38C40 36.897 39.103 36 38 36z">
                                     </path>
                                 </svg>
                             </button>
                             <a href="<?php echo e(route('reciever.blood_request.edit', $data->id)); ?>">
                                 <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="48"
                                     height="48" viewBox="0 0 48 48" style=" fill:#000000;">
                                     <path fill="#c94f60"
                                         d="M42.583,9.067l-3.651-3.65c-0.555-0.556-1.459-0.556-2.015,0l-1.718,1.72l5.664,5.664l1.72-1.718	C43.139,10.526,43.139,9.625,42.583,9.067">
                                     </path>
                                     <path fill="#f0f0f0" d="M6.905,35.43L5,43l7.571-1.906l0.794-6.567L6.905,35.43z">
                                     </path>
                                     <path fill="#edbe00"
                                         d="M36.032,17.632l-23.46,23.461l-5.665-5.665l23.46-23.461L36.032,17.632z">
                                     </path>
                                     <linearGradient id="YoPixpDbHWOyk~b005eF1a_OWRPl8fxkRvG_gr1" x1="35.612"
                                         x2="35.612" y1="7.494" y2="17.921" gradientUnits="userSpaceOnUse">
                                         <stop offset="0" stop-color="#dedede"></stop>
                                         <stop offset="1" stop-color="#d6d6d6"></stop>
                                     </linearGradient>
                                     <path fill="url(#YoPixpDbHWOyk~b005eF1a_OWRPl8fxkRvG_gr1)"
                                         d="M30.363,11.968l4.832-4.834l5.668,5.664l-4.832,4.834L30.363,11.968z"></path>
                                     <path fill="#787878" d="M5.965,39.172L5,43l3.827-0.965L5.965,39.172z"></path>
                                 </svg>
                             </a>
                         </div>
                     </td>
                 </tr>

                 

                 <div class="modal fade manageRequest<?php echo e($data->id); ?>" tabindex="-1" role="dialog"
                     aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered" role="document">
                         <div class="modal-content border-0">
                             <div class="modal-body p-0">
                                 <div class="card border-0 p-sm-3 p-2 justify-content-center">
                                     <div class="card-header pb-0 bg-white border-0 ">
                                         <h4 class="font-weight-bold mb-2">Are you sure this blood has managed?</h4>
                                         <p class="text-danger ">The Request will be remove from your profile if it is
                                             managed..</p>
                                     </div>
                                     <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                                         <div class="row justify-content-end no-gutters">
                                             <div class="col-auto"><button type="button"
                                                     class="btn btn-primary text-light"
                                                     data-bs-dismiss="modal">Cancel</button></div>
                                             <div class="col-auto">
                                                 <form action="<?php echo e(route('reciever.blood_manage', $data->id)); ?>"
                                                     method="post">
                                                     <?php echo csrf_field(); ?>
                                                     <button type="submit" class="btn btn-warning text-light px-4"
                                                         data-dismiss="modal">Confirm</button>
                                                 </form>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </tbody>
     </table>

     <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content border-0">
                 <div class="modal-body p-0">
                     <div class="card border-0 p-sm-3 p-2 justify-content-center">
                         <div class="card-header pb-0 bg-white border-0 ">
                             <div class="row">
                                 <div class="col ml-auto"><button type="button" class="close close-x"
                                         data-bs-dismiss="modal" aria-label="Close"> <span
                                             aria-hidden="true">&times;</span>
                                     </button></div>
                             </div>
                             <h4 class="font-weight-bold mb-2"> Are you sure you wanna delete this request?</h4>
                             <p class="text-danger ">Interactions with donors will be removed if you delete this
                                 request..</p>
                         </div>
                         <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                             <div class="row justify-content-end no-gutters">
                                 <div class="col-auto"><button type="button" class="btn btn-light text-muted"
                                         data-bs-dismiss="modal">Cancel</button></div>
                                 <div class="col-auto"><button type="button" class="btn btn-danger px-4"
                                         data-dismiss="modal" id="delete_blood_request_btn">Delete</button></div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>


     



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
                                        <button interested-id="${element.id}" blood-request-id="${element.blood_request_id}" donor-id="${element.interested_donor_id}" class="btn btn-primary accept-interested-donors" >
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
                         acceptBtn.text('Processing...');
                     },
                     success: function(result) {
                         if (result.success) {
                             if (result.message === 'accepted') {
                                 acceptBtn.text('Accepted');
                             } else {
                                 acceptBtn.text('Accept');
                             }
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
<?php /**PATH C:\xampp\htdocs\blood-donation-hub\resources\views/frontend/user/reciever/blood_request_table.blade.php ENDPATH**/ ?>