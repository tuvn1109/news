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
                                <label class="col-lg-2 col-form-label ">Upload Files:</label>
                                <div class="col-lg-10">
                                    <div class="dropzone dropzone-multi" id="kt_dropzone_4">
                                        <div class="dropzone-panel mb-lg-0 mb-2">
                                            <a class="dropzone-select btn btn-light-primary font-weight-bold btn-sm">Attach
                                                files</a>
                                            <a class="dropzone-upload btn btn-light-primary font-weight-bold btn-sm" style="display: none;">Upload All</a>
                                            <a class="dropzone-remove-all btn btn-light-primary font-weight-bold btn-sm"
                                                style="display: none;" >Remove All</a>
                                        </div>
                                        <div class="dropzone-items">
											<?php
											if (empty($files)) {
												?>
                                                <div class="dropzone-item" style="display: none">
                                                    <div class="dropzone-file">
                                                        <div class="dropzone-filename" title="">
                                                            <span data-dz-name=""></span>
                                                            <strong>(<span
                                                                        data-dz-size=""> Kb</span>)</strong>
                                                        </div>
                                                        <div class="dropzone-error" data-dz-errormessage=""></div>
                                                    </div>
                                                    <div class="dropzone-toolbar">
																			<span class="dropzone-start">
																			</span>
                                                        <span class="dropzone-cancel" data-dz-remove=""
                                                              style="display: none;">
																				<i class="flaticon2-cross"></i>
																			</span>
                                                        <span class="dropzone-delete" data-dz-remove="">
																				<i class="flaticon2-cross"></i>
																			</span>
                                                    </div>

                                                </div>
												<?php
											}
											?>
											<?php
											foreach ($files as $files1):
												$path = (WRITEPATH . 'uploads\user' . $data['Id'] . '/' . $files1 . '');
												$a = get_file_info($path);
												?>
                                                <div class="dropzone-item">
                                                    <div class="dropzone-file">
                                                        <div class="dropzone-filename" title="<?= $files1 ?>">
                                                            <span data-dz-name=""><?= $files1 ?></span>
                                                            <strong>(<span
                                                                        data-dz-size=""><?= number_format($a['size'] / 1000, 2) ?> Kb</span>)</strong>
                                                        </div>
                                                        <div class="dropzone-error" data-dz-errormessage=""></div>
                                                    </div>
                                                    <div class="dropzone-toolbar">
																			<span class="dropzone-start">
																			</span>
                                                        <span class="dropzone-cancel" data-dz-remove=""
                                                              style="display: none;">
																				<i class="flaticon2-cross"></i>
																			</span>
                                                        <span class="dropzone-delete" data-dz-remove="">
																				<i class="flaticon2-cross"
                                                                                   onclick="deleteFile('<?= $files1 ?>','<?= $data['Id'] ?>')"></i>
																			</span>
                                                    </div>

                                                </div>
											<?php
											endforeach;
											?>

                                        </div>


                                        <span class="form-text text-muted">Max file size is 1MB and max number of files is 5.</span>
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
