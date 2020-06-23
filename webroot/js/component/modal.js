export const modal = {
    props: ['header','body','footer'],
    methods: {
        closeModal() {
            this.$store.dispatch('closeModal')
        },
        activeMoal() {
            this.$store.dispatch('activeModal')
        },
        tocallback(iscall) {
            this.$store.dispatch(iscall)
        }
    },
    template: `<div id="exampleModal">
                    <transition name="modal">
                        <div v-if="$store.getters.modal" class="modal-mask">
                            <div class="modal-wrapper">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 v-if="header !== null" class="modal-title" v-html="header"></h4>
                                    <i class="fa fa-times-circle text-right text-danger" @click="closeModal()" title="ปิดหน้าต่าง"></i>
                                </div>
                                <div class="modal-body text-center py-3">
                                    <p v-html="body"></p>
                                </div>
                                <div class="modal-footer">
                                    <button v-if="footer !== null" type="button" class="btn btn-sm btn-primary" @click="tocallback(footer.iscall)">{{footer.istext}}</button>
                                    <button type="button" class="btn btn-sm btn-secondary" @click="closeModal()">ปิดหน้าต่าง</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </transition>
                </div>`
}