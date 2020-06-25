export const product_info = {
    props: [],
    data () {
        return {
            notfound: false
        }
    },
    computed: {
        isactive () {
            let product_detail = this.$store.getters.product_detail
            if(product_detail.isactive === 'N' || product_detail === 'NOT FOUND') {
                this.notfound = true
            }
        }
    },
    template: `<div class="product_d_info">
                    {{isactive}}
                    <slot v-if="!notfound">
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
                                                <span v-html="this.$store.getters.product_detail.description"></span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </slot>
                </div>`
}