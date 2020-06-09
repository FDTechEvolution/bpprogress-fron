export const product_info = {
    props: [],
    template: `<div class="product_d_info">
                    <div v-if="$store.getters.loading_detail == false" class="row">
                        <div class="col-12">
                            <div class="product_d_inner">
                                <div class="product_info_button">
                                    <ul class="nav" role="tablist">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">รายละเอียด</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                                        <div class="product_info_content">
                                            <span v-html="this.$store.getters.product_detail.description">
                                                {{this.$store.getters.product_detail.description}}
                                            </span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`
}