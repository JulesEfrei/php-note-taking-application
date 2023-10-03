<!-- Error Modal -->
<div id="errorModal" class="fixed top-4 right-4 bg-white border border-gray-300 shadow-lg p-4 rounded-lg hidden z-10">
    <div class="flex items-center">
        <!-- Error Icon (You can replace this with your preferred icon) -->
        <i class="fa-solid fa-xmark h-4 w-4 text-red-500 mr-2"></i>
        <!-- Error Message -->
        <span class="text-red-500">An error occurred!</span>
    </div>
</div>

<script>
    // Show the error modal
    function showErrorModal() {
        const errorModal = document.getElementById("errorModal");
        errorModal.classList.remove("hidden");

        // Hide the modal after 2 seconds
        setTimeout(() => {
            errorModal.classList.add("hidden");
        }, 2000);
    }

    // Call this function to trigger the error modal (for example, after an error occurs)
    showErrorModal();
</script>