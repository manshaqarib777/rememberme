// src/mixins/globalMixin.js
import { toast } from "vue3-toastify";

export const globalMixin = {
    methods: {
        handleError(errors) {
            if (typeof errors === 'string') {
                toast.error(errors);
            }
            else {
                Object.keys(errors).forEach((key) => {
                    const errorMessages = errors[key];

                    // Check if the error messages are an array or a string
                    if (Array.isArray(errorMessages)) {
                        errorMessages.forEach((error) => {
                            toast.error(`Media upload failed: ${error}`);
                        });
                    } else if (typeof errorMessages === 'string') {
                        toast.error(errorMessages);
                    } else {
                        toast.error("An error occurred. Please try again.");
                    }
                });
            }
        },
        handleSuccess(success) {
            toast.success(success);
        },
    },
};
