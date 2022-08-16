<?php
$this->load->view('admin/header');
?>
<h1>News</h1>
<a href="<?php echo base_url('admin/news/add')?>" class="btn btn-info">Add New News</a>
<hr>
<?php
if ($this->session->flashdata('success')) {
    ?>

<div class="alert alert-success" role="alert">
  <?php
    echo $this->session->flashdata('success'); ?>
</div>
<?php
}?>
<?php
if ($this->input->get('keyword')) {
        ?>
	<b>Search Result For "<?php echo $this->input->get('keyword'); ?>"</b>
	<?php
    }
?>
<table class="table table-bordered">
	<tr>
		<th>Title</th>
		<th>Author</th>
		<th>Action</th>
	</tr>
	<?php
    //var_dump($news);
    foreach ($news as $news_item) {
        ?>
		<tr>
			<td><?php echo $news_item->title; ?></td>
			<td><?php echo $news_item->author; ?></td>
			<td>
				<a href="<?php echo base_url('admin/news/edit/'.$news_item->id)?>" class="btn btn-primary">Edit</a>
				<a href="<?php echo base_url('admin/news/delete/'.$news_item->id)?>" class="btn btn-danger">Delete</a>
			</td>
		</tr>
		<?php
    }
    ?>
</table>
<?php
$this->load->view('admin/footer');
?>
