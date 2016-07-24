<div class="row">
    <form method="post" action="/main/save" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data["id"]; ?>"
        <div class="form-group">
            <div class="col-md-12">
                <label for="date_representatives_rda_doc">Файл відповіді</label>
            </div>
            <div class="col-md-3">
                <input required type="file" name="send_file" class="form-control">
            </div>
            <div class="col-md-3">
                <input id="clear" type="button" class="form-control" value="Очистити">
            </div>
        </div>
        <input class="btn btn-success" type="submit" value="Надіслати">
    </form>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/clearFile.js"></script>
