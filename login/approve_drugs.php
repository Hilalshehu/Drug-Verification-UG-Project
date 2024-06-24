<?php
session_start();
require_once 'config/config.php';
require_once BASE_PATH.'/includes/auth_validate.php';



// Check if the user is a super admin
if ($_SESSION['admin_type'] !== 'super') {
    header('Location: drugs.php');
    exit();
}

// Serve POST method to approve/reject drugs
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $db = getDbInstance();
    $drug_id = $_POST['drug_id'];
    $action = $_POST['action'];

    if ($action === 'approve') {
        $status = 'approved';
    } elseif ($action === 'reject') {
        $status = 'rejected';
    }

    $data_to_update = ['status' => $status, 'updated_by' => $_SESSION['user_id'], 'updated_at' => date('Y-m-d H:i:s')];
    $db->where('id', $drug_id);
    if ($db->update('drugs', $data_to_update)) {
        $_SESSION['success'] = 'Drug status updated successfully!';
    } else {
        $_SESSION['failure'] = 'Failed to update drug status: ' . $db->getLastError();
    }

    header('Location: approve_drugs.php');
    exit();
}

// Get pending drugs
$db = getDbInstance();
$db->where('status', 'pending');
$pending_drugs = $db->get('drugs');

include BASE_PATH.'/includes/header.php';
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Pending Drugs</h2>
        </div>
    </div>
    <?php if ($_SESSION['admin_type'] === 'super'): ?>
    <li><a href="drugs.php">List Of Drugs</a></li>
<?php endif; ?>

    <!-- Flash messages -->
    <?php include BASE_PATH.'/includes/flash_messages.php'; ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (empty($pending_drugs)): ?>
                <p>No pending drugs found.</p>
            <?php else: ?>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Drug Name</th>
                            <th>Drug Number</th>
                            <th>Manufacturer</th>
                            <th>Date of Registration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pending_drugs as $drug): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($drug['id']); ?></td>
                                <td><?php echo htmlspecialchars($drug['drug_name']); ?></td>
                                <td><?php echo htmlspecialchars($drug['drug_number']); ?></td>
                                <td><?php echo htmlspecialchars($drug['manufacturer']); ?></td>
                                <td><?php echo htmlspecialchars($drug['date_of_registration']); ?></td>
                                <td>
                                    <form action="approve_drugs.php" method="post" style="display:inline;">
                                        <input type="hidden" name="drug_id" value="<?php echo $drug['id']; ?>">
                                        <button type="submit" name="action" value="approve" class="btn btn-success">Approve</button>
                                    </form>
                                    <form action="approve_drugs.php" method="post" style="display:inline;">
                                        <input type="hidden" name="drug_id" value="<?php echo $drug['id']; ?>">
                                        <button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include BASE_PATH.'/includes/footer.php'; ?>
