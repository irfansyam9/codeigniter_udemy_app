<div class="row">
    <div id="dashboard-side" class="col-md-4">
        <h2>Todos</h2>
        <form id="create_todo" role="form" method="post" action="<?=site_url('api/create_todo')?>">
            <div class="form-group">
                <input type="text" placeholder="Content" name="content" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Add Todo" class="btn btn-default">
            </div>
        </form>
        <div id="list_todo"><div class="ajax_loader"></div></div>
    </div>
    <div id="dashboard-main" class="col-md-8">
        <h2>Notes</h2>
        <form id="create_note" role="form" method="post" action="<?=site_url('api/create_note')?>">
            <div class="form-group">
                <input type="text" placeholder="Title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" placeholder="Content" name="content" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" value="Add Note" class="btn btn-default">
            </div>
        </form>
        <div id="list_notes"><div class="ajax_loader"></div></div>
    </div>
</div>
