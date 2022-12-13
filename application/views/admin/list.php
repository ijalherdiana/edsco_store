<!-- Info boxes -->
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua">
                <i class="fa fa-shopping-bag"></i></span>


            <div class="info-box-content">
                <span class="info-box-text">Data Produk</span>
                <span
                    class="info-box-number"><?= $this->dashboard_model->total_produk()->total; ?><small>Produk</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Customer</span>
                <span class="info-box-number"><?= $this->dashboard_model->total_pelanggan()->total; ?><small>
                        Orang</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Transaksi</span>
                <span class="info-box-number"><?= $this->dashboard_model->total_header_transaksi()->total; ?><small>
                        Transaksi</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Pendapatan</span>
                <span class="info-box-number"><?= number_format($this->dashboard_model->total_transaksi()->total) ?>
                    <br><small>Seluruh Transaksi</small></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-newspaper-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Berita</span>
                <span class="info-box-number"><?= number_format($this->dashboard_model->total_berita()->total) ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-cc-mastercard"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Rekening</span>
                <span
                    class="info-box-number"><?= number_format($this->dashboard_model->total_rekening()->total) ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

</div>