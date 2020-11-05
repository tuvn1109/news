<div class="card card-custom">
    <!--begin::Header-->
    <div class="card-header flex-wrap border-0 ">
        <div class="card-title">
            <h3 class="card-label">Thông tin người dùng
            </h3>
        </div>

    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <!--begin: Datatable-->
        <!--begin::Form-->
		<?php
		if ($data) {
			?>
            <div class="row">
                <div class="col-xl-2"></div>
                <div class="col-xl-8">
                    <form id="form_edit_user">
                        <div class="card-body">
                            <input class="form-control" type="text" value="<?= $data['id'] ?>"
                                   name="id" hidden/>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Họ tên</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?= $data['fullname'] ?>"
                                           name="fullname"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Số điện thoại</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?= $data['phone'] ?>"
                                           name="phone"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-2 col-form-label">Email</label>
                                <div class="col-10">
                                    <input class="form-control" type="email" value="<?= $data['email'] ?>"
                                           name="email"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-url-input" class="col-2 col-form-label">Tài khoản</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?= $data['username'] ?>"
                                           name="username"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-tel-input" class="col-2 col-form-label">Mật khẩu</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" value="<?= $data['password'] ?>"
                                           name="password"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label">Upload File</label>
                                <div class="col-lg-6">
                                    <div class="uppy" id="kt_uppy_5">
                                        <div class="uppy-wrapper"></div>
                                        <div class="uppy-list"></div>
                                        <div class="uppy-status"></div>
                                        <div class="uppy-informer uppy-informer-min"></div>
                                    </div>
                                    <span class="form-text text-muted">Max file size is 1MB and max number of files is 5</span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 col-sm-12 text-lg-right">Multiple File
                                    Upload</label>
                                <div class="col-lg-4 col-md-9 col-sm-12">
                                    <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
                                        <div class="dropzone-msg dz-message needsclick">
                                            <h3 class="dropzone-msg-title">Drop files here or click to upload.</h3>
                                            <span class="dropzone-msg-desc">Upload up to 10 files</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card-footer">
                            <div class="row align-center">
                                <div class="col-10 ">
                                    <button type="submit" class="btn btn-light-primary mr-2">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-2"></div>
            </div>
            <!--end: Datatable-->
			<?php
		} else {
			?>
            <div class="row  align-center">
                <div class="col-xl-12">
                    <p>Người dùng không tồn tại !</p>
                </div>
            </div>
			<?php
		}
		?>
    </div>
    <!--end::Body-->
</div>
