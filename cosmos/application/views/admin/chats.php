
<?= showMsg(); ?>
<?= getBredcrum(ADMIN, array('#' => 'Chat Management')); ?>
<div class="row margin-bottom-10">
    <div class="col-md-12">
        <h2 class="no-margin"><i class="fa fa-comments"></i> Manage <?php if ($this->uri->segment(4) > 0): ?><strong>" <?php echo ucwords($member_row->mem_fname.' '.$member_row->mem_lname); ?>'s "</strong> <?php endif; ?>Chats</h2>
    </div>
</div>
<table class="table table-bordered datatable" id="table-1">
    <thead>
        <tr>
            <th width="5%" class="text-center">Sr#</th>
            <th>Members</th>
            <th>Last Message</th>
            <th>Date</th>
            <th width="12%" class="text-center">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($rows) > 0): $count = 0; ?>
            <?php foreach ($rows as $row): ?>
                <tr class="odd gradeX">
                    <td class="text-center"><?= ++$count; ?></td>
                    <td>
                        <a href="<?= site_url(ADMIN.'/'.get_mem_type($row->mem_one).'s/manage/'.$row->mem_one); ?>" target="_blank"><b><?= get_mem_name($row->mem_one); ?></b></a>
                        <i class="fa fa-exchange"></i> 
                        <a href="<?= site_url(ADMIN.'/'.get_mem_type($row->mem_two).'s/manage/'.$row->mem_two); ?>" target="_blank"><b><?= get_mem_name($row->mem_two); ?></b></a>
                    </td>
                    <td>
                        <span  style="color: #3e3b3beb"><?=short_text($row->msg_row->msg=='' && count($row->msg_row->attachments)>0?'<i class="fa fa-paperclip"></i> Attachment':$row->msg_row->msg,100)?></span>
                    </td>
                    <td><?= format_date($row->msg_row->time,'M d, Y h:i:m a'); ?></td>
                    <td class="text-center">
                        <a href="<?= site_url(ADMIN.'/chat/messages/'.$row->id); ?>" class="btn btn-primary btn-sm"><span class="fa fa-envelope"></span> Messages</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<script type="text/javascript">
    (function($){
        $(function(){

        })
    }(jQuery))
</script>