<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH . '/includes/auth_validate.php';

// drugs class
require_once BASE_PATH . '/lib/drugs/drugs.php';
$drugs = new drugs();

// Get Input data from query string
$order_by	= filter_input(INPUT_GET, 'order_by');
$order_dir	= filter_input(INPUT_GET, 'order_dir');
$search_str	= filter_input(INPUT_GET, 'search_str');

// Per page limit for pagination
$pagelimit = 15;

// Get current page
$page = filter_input(INPUT_GET, 'page');
if (!$page) {
	$page = 1;
}

// If filter types are not selected we show latest added data first
if (!$order_by) {
	$order_by = 'id';
}
if (!$order_dir) {
	$order_dir = 'Desc';
}

// Get DB instance. i.e instance of MYSQLiDB Library
$db = getDbInstance();
$select = array('id', 'drug_name', 'created_at','drug_number','manufacturer', 'date_of_registration', 'status', 'updated_at');

// Start building query according to input parameters
// If search string
if ($search_str) {
	$db->where('drug_name', '%' . $search_str . '%', 'like');
}
// If order direction option selected
if ($order_dir) {
	$db->orderBy($order_by, $order_dir);
}

// Set pagination limit
$db->pageLimit = $pagelimit;

// Get result of the query
$rows = $db->arraybuilder()->paginate('drugs', $page, $select);
$total_pages = $db->totalPages;
?>
<?php include BASE_PATH . '/includes/header.php'; ?>

<?php
	include_once 'config/config.php';
	if(isset($_POST['submit'])){
		if($_FILES['csv_data']['name']){
			
			$arrFileName = explode('.',$_FILES['csv_data']['name']);
			if($arrFileName[1] == 'csv'){
				$handle = fopen($_FILES['csv_data']['tmp_name'], "r");
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$drugName = mysqli_real_escape_string($conn,$data[0]);
					$drugNumber = mysqli_real_escape_string($conn,$data[3]);
					$manufacturerName = mysqli_real_escape_string($conn,$data[6]);
                    $status = mysqli_real_escape_string($conn,$data[6]);
					$date = date("Y/m/d");
					$import="INSERT into drugs(drug_name,drug_number,manufacturer,created_at) values('$drugName', '$drugNumber', '$manufacturerName','$date','$status')";
					mysqli_query($conn,$import);
				}
				fclose($handle);
				print "Import done";
			}
		}
	}
?>


<!-- Main container -->
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-4">
            <h1 class="page-header">Drug Manager</h1>
        </div>
        <div class="col-lg-2">
            <div class="page-action-links text-right">
                <a href="add_drug.php?operation=create" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add new</a>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="page-action-links text-right">
                <a href="includes/sample_format.csv" class="btn btn-success"><i class="	glyphicon glyphicon-download"></i> Download Format</a>
            </div>
        </div>
        <div class="col-lg-2">
        <form method='POST' enctype='multipart/form-data'>
		<input type='file' name='csv_data' /><br><input type='submit' name='submit' class="btn btn-success " value='Upload CSV' />
		</form>
        </div>
        <div class="col-lg-2">
            <div class="page-action-links text-right">
                <a href="dcsvdrug.php" class="btn btn-success"><i class="glyphicon glyphicon-check"></i> Export as CSV</a>
            </div>
        </div>
    </div>
    <?php include BASE_PATH . '/includes/flash_messages.php'; ?>

    <!-- Filters -->
    <div class="well text-center filter-form">
        <form class="form form-inline" action="">
            <label for="input_search">Search</label>
            <input type="text" class="form-control" id="input_search" name="search_str" value="<?php echo htmlspecialchars($search_str ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            <label for="input_order">Order By</label>
            <select name="order_by" class="form-control">
                <?php
foreach ($drugs->setOrderingValues() as $opt_value => $opt_name):
	($order_by === $opt_value) ? $selected = 'selected' : $selected = '';
	echo ' <option value="' . $opt_value . '" ' . $selected . '>' . $opt_name . '</option>';
endforeach;
?>
            </select>
            <select name="order_dir" class="form-control" id="input_order">
                <option value="Asc" <?php
if ($order_dir == 'Asc') {
	echo 'selected';
}
?> >Asc</option>
                <option value="Desc" <?php
if ($order_dir == 'Desc') {
	echo 'selected';
}
?>>Desc</option>
            </select>
            <input type="submit" value="Go" class="btn btn-primary">
        </form>
    </div>
    <hr>
    <!-- //Filters -->

    <!-- Table -->
    <table class="table table-striped table-bordered table-condensed">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="20%">Drug Name</th>
                <th width="20%">Drug Number</th>
                <th width="20%">Manufacturer</th>
                <th width="15%">Date of Registration</th>
                <th width="10%">Status</th>
                <th width="10%">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['drug_name']); ?></td>
                <td><?php echo htmlspecialchars($row['drug_number']); ?></td>
                <td><?php echo htmlspecialchars($row['manufacturer']); ?></td>
                <td><?php echo htmlspecialchars($row['date_of_registration']); ?></td>
                <td><?php echo htmlspecialchars($row['status']); ?></td>
                <td>
                    <a href="edit_drug.php?drug_id=<?php echo $row['id']; ?>&operation=edit" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="#" class="btn btn-danger delete_btn" data-toggle="modal" data-target="#confirm-delete-<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="confirm-delete-<?php echo $row['id']; ?>" role="dialog">
                <div class="modal-dialog">
                    <form action="delete_drug.php" method="POST">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Confirm</h4>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="del_id" id="del_id" value="<?php echo $row['id']; ?>">
                                <p>Are you sure you want to delete this row?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default pull-left">Yes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- //Delete Confirmation Modal -->
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- //Table -->

    <!-- Pagination -->
    <div class="text-center">
    	<?php echo paginationLinks($page, $total_pages, 'drugs.php'); ?>
    </div>
    <!-- //Pagination -->
</div>
<!-- //Main container -->
<?php include BASE_PATH . '/includes/footer.php'; ?>
