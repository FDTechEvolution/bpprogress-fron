export const modal = {
    props: ['header','body','footer'],
    methods: {
        closeModal() {
            this.$store.dispatch('closeModal')
        },
        activeMoal() {
            this.$store.dispatch('activeModal')
        }
    },
    template: `<div id="exampleModal">
                    <transition name="modal">
                        <div v-if="$store.getters.modal" class="modal-mask">
                            <div class="modal-wrapper">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 v-if="header !== null" class="modal-title">{{header}}</h4>
                                    <i class="fa fa-times-circle text-right text-danger" @click="closeModal()"></i>
                                </div>
                                <div class="modal-body text-center py-3">
                                    <p>{{body}}</p>
                                </div>
                                <div class="modal-footer">
                                    <button v-if="footer !== null" type="button" class="btn btn-sm btn-primary" @click="activeModal()">{{footer}}</button>
                                    <button type="button" class="btn btn-sm btn-secondary" @click="closeModal()">ปิดหน้าต่าง</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </transition>
                </div>`
}