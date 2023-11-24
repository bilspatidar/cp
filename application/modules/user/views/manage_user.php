<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
        </ul>
        <div class="tab-content pt-2" id="myTabContent">
            <div class="tab-pane fade show active session_views" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form class="form-inline filterForm">
                        <div div class="row">
                        <div class="col-md-3"> <lable>Name/Mobile/Email</lable> <input type="text" id="filterOne" class="form-control input-sm"> </div>
                        <div class="col-md-3"> <lable>Status</lable> <select id="filterTwo" class="form-control input-sm"><option value="">Status</option><option value="Active">Active</option><option value="Deactive">Deactive</option></select> </div>
                        <div class="col-md-3"> <lable>Show Deleted</lable> <select id="filterThree" class="form-control input-sm"><option value="0">No</option><option value="1">Yes</option></select> </div>  
                        <div class="col-md-2"><lable><br></lable><button class="btn btn-outline-primary" type="button" onClick="loadTableData(1)">SEARCH</button></div></div></form>
                <p>
		            <div id="pageNumber" style="display:none;"></div>
                    <div class="table-responsive" id="loadTableData">
                        <h3>Data is loading please wait..   <i class="fa fa-refresh fa-spin"></i> </h3>
                    </div>
                    <div align="right" id="paginationLink"></div>
                </p>
            </div>
        </div>
    </div>
</div>
