<div class="modal fade" id="reserveNowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="frmReserveNow" method="POST" action="<?php echo base_url(). 'home/reserve_now'; ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reserve Now</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="inputReservationOrigin">Origin</label>
                            <input type="text" class="form-control" id="inputReservationOrigin" name="reservation_origin" placeholder="Enter reservation origin.." required>
                        </div>

						<div class="col-sm-6">
                            <label for="inputReservationDestination">Destination</label>
                            <input type="text" class="form-control" id="inputReservationDestination" name="reservation_destination" placeholder="Enter reservation destination.." required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label for="inputReservationDate">Date</label>
                            <input type="text" class="form-control" id="inputReservationDate" name="reservation_date" placeholder="Enter reservation date.." required>
                        </div>
						
                        <div class="col-sm-4">
                            <label for="inputReservationTime">Time</label>
                            <input type="text" class="form-control" id="inputReservationTime" name="reservation_time" placeholder="Enter reservation time.." required>
                        </div>

						<div class="col-sm-4">
                            <label for="cmbReservationBus">Bus</label>
                            <select name="reservation_bus" id="cmbReservationBus" class="form-control" required>
                                <option disabled="disabled" selected="selected">Choose Bus</option>
                                <?php foreach($buses as $bus){?>
                                    <option value="<?php echo $bus->bus_id;?>">
                                        <?php echo $bus->bus_name;?>
                                    </option>
                                    <?php }?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
