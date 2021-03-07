<div>
    <h1>Search for members:</h1>
    <form method="get" action="{{ url('search') }}">
        <div class="input-group">
            <span class="input-group-btn"   >
                <button style="border-color: #CC0000;" class="btn btn-default" type="submit"><span style="color: #CC0000" class="glyphicon glyphicon-search"></span></button>
            </span>
            <input style="border-color: #23bf32;"type="text" class="form-control" required name="q" placeholder="Enter a Name or Member Number...">
        </div><!-- /input-group -->
    </form>
</div>