     <?php $this->load->view('include/userAction');  ?>
    <form id="crudFormEdit" action="<?php echo base_url(); ?>master/add_user_availability/update" method="POST" class="row crudForm g-3">
                          
                           <div class="col-md-4">
                                <label for="" class="form-label">User</label>
                                <input type="hidden" name="id" value="<?php echo $row[0]->id ;?>">
                               <select class="form-control" name="users_id">
                                   <option value="">Select User</option>
                                 <?php 
                                        $users = $this->Common->getUserName(4);
                                        foreach($users as $user){ ?>
                                        <option value="<?php echo $user->users_id; ?>" <?php if($user->users_id==$row[0]->users_id){echo 'selected';} ?> >
                                            <?php echo $user->name; ?></option>
                                        <?php } ?>
                               </select>
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">Day</label>
                               <select class="form-control" name="day">
                                   <option value="">Select Day</option>
                                    <option value="Monday" <?php if($row[0]->day=='Monday'){echo 'selected';} ?> >Monday</option>
                                    <option value="Tuesday" <?php if($row[0]->day=='Tuesday'){echo 'selected';} ?>>Tuesday</option>
                                    <option value="Wednesday" <?php if($row[0]->day=='Wednesday'){echo 'selected';} ?>>Wednesday</option>
                                    <option value="Thursday" <?php if($row[0]->day=='Thursday'){echo 'selected';} ?>>Thursday</option>
                                    <option value="Friday" <?php if($row[0]->day=='Friday'){echo 'selected';} ?>>Friday</option>
                                    <option value="Saturday" <?php if($row[0]->day=='Saturday'){echo 'selected';} ?>>Saturday</option>
                                    <option value="Sunday" <?php if($row[0]->day=='Sunday'){echo 'selected';} ?>>Sunday</option>
                               </select>
                          </div>
                          
                          <div class="col-md-4">
                                <label for="" class="form-label">From Time</label>
                               <input type="time" class="form-control" name="from_time" value="<?php echo $row[0]->from_time ;?>">
                          </div>
                          <div class="col-md-4">
                                <label for="" class="form-label">To Time</label>
                               <input type="time" class="form-control" name="to_time" value="<?php echo $row[0]->to_time ;?>">
                          </div>
                          
                          <div class="col-12">
                                <button class="btn btn-outline-primary btn-sm" type="submit">Submit </button>
                          </div>
                </form>
