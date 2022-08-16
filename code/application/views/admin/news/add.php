<?php
$this->load->view('admin/header');
?>
<h1>Add New News</h1>
<p>Add your new news from the form below</p>
<form action="<?php echo base_url('admin/news/save');?>" method = "post">
  <div class ="col-md-7">
  <div class = "form-group">
    <div class = "row">
      <label class = "col-md-3">Title</label>
      <div class = "col-md-9">
    <input type = "text" name = "title" class="form-control">
  </div>
  <div class = "clearfix"> </div>
  </div>
  <div class = "form-group">
    <div class = "row">
      <label class = "col-md-3">Author</label>
      <div class = "col-md-9">
    <input type = "text" name = "author" class="form-control">
  </div>
  <div class = "clearfix"> </div>
  </div>
  </div>
  <div class = "form-group">
    <div class = "row">
      <label class = "col-md-3">Description</label>
      <div class = "col-md-9">
    <textarea name = "description" class="form-control">
  </textarea>
  <div class = "clearfix"> </div>
  </div>
  <input type = "submit" name ="submit" class = "btn btn-primary" value = "Save">
</div>
<div class = "clearfix"></div>
</form>
<?php
$this->load->view('admin/footer');
?>
