<div class="card card-outline card-primary rounded-0 shadow">
	<div class="card-header">
		<h3 class="card-title">List of My Test Results</h3>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-hover table-striped">
				<colgroup>
					<col width="5%">
					<col width="25%">
					<col width="25%">
					<col width="25%">
					<col width="20%">
				</colgroup>
				<thead>
					<tr class="bg-gradient-primary text-light">
						<th>#</th>
						<th>Code</th>
						<th>Test</th>
						<th>Result</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						$qry = $conn->query("SELECT * from `appointment_list` where client_id ='{$_settings->userdata('id')}' and status = 6 order by unix_timestamp(date_created) desc ");
						while($row = $qry->fetch_assoc()):
                            $tests = $conn->query("SELECT * FROM `test_list` where id in (SELECT test_id FROM `appointment_test_list` where appointment_id = '{$row['id']}')");
                            $test = "N/A";
                            if($tests->num_rows > 0){
                                $res = $tests->fetch_all(MYSQLI_ASSOC);
                                $test_arr = array_column($res,'name');
                                $test = implode(", ",$test_arr);
                            }
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td class=""><?= $row['code'] ?></td>
							<td class=""><p class="m-0 truncate-1"><?= $test ?></p></td>
                            <td class="">
							<?php if(isset($row['code']) && is_file(base_app."uploads/reports/".$row['code'].".pdf")): ?>
                                <a href='<?= base_url."uploads/reports/".$row['code'].".pdf" ?>' target='_blank' download='<?= $row['code'].".pdf" ?>'><?= $row['code'].".pdf" ?></a>
                            <?php else: ?>
                                N/A
                            <?php endif; ?>
							</td>
							<td align="center">
                                <a href='<?= base_url."uploads/reports/".$row['code'].".pdf" ?>' target='_blank' class="text-muted"><i class="fa fa-external-link-alt text-muted"></i> <b>View Result</b></a>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(function(){
		$('.table').dataTable({
            columnDefs: [
                { orderable: false, targets: 4 }
            ],
        });
	})
</script>