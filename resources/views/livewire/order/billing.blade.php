<div>
    {{-- Stop trying to control. --}}
    <div class="row">
        <section class="gray-light min-sec">
          <div class="container">
            <div class="row form-submit">
              <div class="col-lg-8 col-md-12 col-sm-12">
                <!-- row -->
                <div class="row m-0">
                  <div class="billing_page mb-4">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3>Billing Detail</h3>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Name<i class="req">*</i></label>
                          <input
                            type="text"
                            class="form-control with-light"
                          />
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Email<i class="req">*</i></label>
                          <input
                            type="text"
                            class="form-control with-light"
                          />
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group with-light">
                          <label
                            >Country<i class="req">*</i></label
                          >
                          <select
                            class="form-control"
                            tabindex="-1"
                            aria-hidden="true"
                          >
                            <option value="">&nbsp;</option>
                            <option value="1">
                              United State
                            </option>
                            <option value="2">
                              United kingdom
                            </option>
                            <option value="3">India</option>
                            <option value="4">Canada</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                          <label
                            >Street<i class="req">*</i></label
                          >
                          <input
                            type="text"
                            class="form-control with-light"
                          />
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>Apartment</label>
                          <input
                            type="text"
                            class="form-control with-light"
                          />
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label
                            >Town/City<i class="req">*</i></label
                          >
                          <input
                            type="text"
                            class="form-control with-light"
                          />
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label>State<i class="req">*</i></label>
                          <input
                            type="text"
                            class="form-control with-light"
                          />
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <label
                            >Postcode/Zip<i class="req"
                              >*</i
                            ></label
                          >
                          <input
                            type="text"
                            class="form-control with-light"
                          />
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                          <input
                            id="a-2"
                            class="checkbox-custom"
                            name="a-2"
                            type="checkbox"
                          />
                          <label
                            for="a-2"
                            class="checkbox-custom-label"
                            >Create An Account</label
                          >
                        </div>
                      </div>
                    </div>
                  </div>

                  <div
                    class="panel-group pay_opy980"
                    id="payaccordion"
                  >
                    <!-- Pay By Paypal -->
                    <div class="panel panel-default">
                      <div class="panel-heading" id="pay">
                        <h4 class="panel-title">
                          <a
                            data-toggle="collapse"
                            role="button"
                            data-parent="#payaccordion"
                            href="#payPal"
                            aria-expanded="false"
                            aria-controls="payPal"
                            class="collapsed"
                            >PayPal<img
                              src="assets/img/paypal.png"
                              class="img-fluid"
                              alt=""
                          /></a>
                        </h4>
                      </div>
                      <div
                        id="payPal"
                        class="panel-collapse collapse"
                        aria-labelledby="pay"
                        data-parent="#payaccordion"
                        style=""
                      >
                        <div class="panel-body">
                          <form>
                            <div class="form-group">
                              <label class="active"
                                >PayPal Email</label
                              >
                              <input
                                type="text"
                                class="form-control with-light"
                                placeholder="paypal@gmail.com"
                              />
                            </div>
                            <div class="form-group">
                              <button
                                type="submit"
                                class="btn dark-2 btm-md full-width"
                              >
                                Pay 400.00 USD
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Pay By Strip -->
                    <div class="panel panel-default">
                      <div class="panel-heading" id="stripes">
                        <h4 class="panel-title">
                          <a
                            data-toggle="collapse"
                            role="button"
                            data-parent="#payaccordion"
                            href="#stripePay"
                            aria-expanded="false"
                            aria-controls="stripePay"
                            class="collapsed"
                            >Stripe<img
                              src="assets/img/strip.png"
                              class="img-fluid"
                              alt=""
                          /></a>
                        </h4>
                      </div>
                      <div
                        id="stripePay"
                        class="collapse"
                        aria-labelledby="stripes"
                        data-parent="#payaccordion"
                        style=""
                      >
                        <div class="panel-body">
                          <form>
                            <div class="row">
                              <div
                                class="col-lg-6 col-md-6 col-sm-12"
                              >
                                <div class="form-group">
                                  <label>Card Holder Name</label>
                                  <input
                                    type="text"
                                    class="form-control with-light"
                                  />
                                </div>
                              </div>

                              <div
                                class="col-lg-6 col-md-6 col-sm-12"
                              >
                                <div class="form-group">
                                  <label>Card Number</label>
                                  <input
                                    type="text"
                                    class="form-control with-light"
                                  />
                                </div>
                              </div>

                              <div
                                class="col-lg-5 col-md-5 col-sm-6"
                              >
                                <div class="form-group">
                                  <label>Expire Month</label>
                                  <input
                                    type="text"
                                    class="form-control with-light"
                                  />
                                </div>
                              </div>

                              <div
                                class="col-lg-5 col-md-5 col-sm-6"
                              >
                                <div class="form-group">
                                  <label>Expire Year</label>
                                  <input
                                    type="text"
                                    class="form-control with-light"
                                  />
                                </div>
                              </div>

                              <div
                                class="col-lg-2 col-md-2 col-sm-12"
                              >
                                <div class="form-group">
                                  <label>CVC</label>
                                  <input
                                    type="text"
                                    class="form-control with-light"
                                  />
                                </div>
                              </div>

                              <div
                                class="col-lg-12 col-md-12 col-sm-12"
                              >
                                <div class="form-group">
                                  <input
                                    id="ct-1"
                                    class="checkbox-custom"
                                    name="ct-1"
                                    type="checkbox"
                                  />
                                  <label
                                    for="ct-1"
                                    class="checkbox-custom-label"
                                    >By Continuing, you ar'e agree
                                    to conditions</label
                                  >
                                </div>
                              </div>

                              <div
                                class="col-lg-12 col-md-12 col-sm-12"
                              >
                                <div
                                  class="form-group text-center"
                                >
                                  <a
                                    href="#"
                                    class="btn dark-2 full-width"
                                    >Pay 202.00 USD</a
                                  >
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Pay By Debit or credtit -->
                    <div class="panel panel-default">
                      <div class="panel-heading" id="dabit">
                        <h4 class="panel-title">
                          <a
                            data-toggle="collapse"
                            role="button"
                            href="#payaccordion"
                            data-target="#debitPay"
                            aria-expanded="false"
                            aria-controls="debitPay"
                            class="collapsed"
                            >Debit Or Credit<img
                              src="assets/img/debit.png"
                              class="img-fluid"
                              alt=""
                          /></a>
                        </h4>
                      </div>
                      <div
                        id="debitPay"
                        class="panel-collapse collapse"
                        aria-labelledby="dabit"
                        data-parent="#payaccordion"
                        style=""
                      >
                        <div class="panel-body">
                          <form>
                            <div class="row">
                              <div
                                class="col-lg-6 col-md-6 col-sm-12"
                              >
                                <div class="form-group">
                                  <label>Card Holder Name</label>
                                  <input
                                    type="text"
                                    class="form-control with-light"
                                  />
                                </div>
                              </div>

                              <div
                                class="col-lg-6 col-md-6 col-sm-12"
                              >
                                <div class="form-group">
                                  <label>Card Number</label>
                                  <input
                                    type="text"
                                    class="form-control with-light"
                                  />
                                </div>
                              </div>

                              <div
                                class="col-lg-5 col-md-5 col-sm-6"
                              >
                                <div class="form-group">
                                  <label>Expire Month</label>
                                  <input
                                    type="text"
                                    class="form-control with-light"
                                  />
                                </div>
                              </div>

                              <div
                                class="col-lg-5 col-md-5 col-sm-6"
                              >
                                <div class="form-group">
                                  <label>Expire Year</label>
                                  <input
                                    type="text"
                                    class="form-control with-light"
                                  />
                                </div>
                              </div>

                              <div
                                class="col-lg-2 col-md-2 col-sm-12"
                              >
                                <div class="form-group">
                                  <label>CVC</label>
                                  <input
                                    type="text"
                                    class="form-control with-light"
                                  />
                                </div>
                              </div>

                              <div
                                class="col-lg-12 col-md-12 col-sm-12"
                              >
                                <div class="form-group">
                                  <input
                                    id="ct-2"
                                    class="checkbox-custom"
                                    name="ct-2"
                                    type="checkbox"
                                  />
                                  <label
                                    for="ct-2"
                                    class="checkbox-custom-label"
                                    >By Continuing, you ar'e agree
                                    to conditions</label
                                  >
                                </div>
                              </div>

                              <div
                                class="col-lg-12 col-md-12 col-sm-12"
                              >
                                <div
                                  class="form-group text-center"
                                >
                                  <a
                                    href="#"
                                    class="btn dark-2 full-width"
                                    >Pay 202.00 USD</a
                                  >
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/row -->
              </div>

              <!-- Col-lg 4 -->
              <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="product-wrap">
                      <h5>Summary</h5>
                      <ul>
                        <li><strong>Total</strong>$319</li>
                        <li><strong>Subtotal</strong>$319</li>
                        <li><strong>Tax</strong>$10</li>
                        <li><strong>Total</strong>$329</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /col-lg-4 -->
            </div>
          </div>
        </section>
      </div>
      <div class="btn-group text-center" role="group" aria-label="Basic example" style='display: block;'>
        <button type="button" class="btn mr-2"><a class="btn btn-themex dark mr-2" wire:click='previousStep'>Previous</a></button>
        <button type="button" class="btn mr-2"><a class="btn btn-themex dark mr-2" wire:click='store'>Confirm</a></button>
    </div>
</div>
