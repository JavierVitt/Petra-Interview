

<?php $__env->startSection('title', 'User | Manage Page'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <p class="text-center text-4xl mt-12">Question 1: Berikan saya alasan mengapa saya harus merekrut anda!</p>
    <div class="text-center">
        <input type="text" class="mt-8 bg-gray-300 mx-8 w-11/12 h-96 rounded-lg" placeholder="Masukan Jawaban Anda Disini" autofocus>
    </div>
    <div class="grid grid-cols-5 mt-8">
        <div class="text-right col-span-2">
            <button class=" bg-red-600 py-3 px-12 rounded-lg text-white text-lg border-black border-1 hover:shadow-xl">Back</button>
        </div>
        <div class="col-span-1"></div>
        <div class="text-left col-span-2">
            <button class=" bg-blue-800 py-3 px-12 rounded-lg text-white text-lg border-black border-1 hover:shadow-xl">Next</button>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\UASWebFrame\UAS\resources\views/interviewer/questions.blade.php ENDPATH**/ ?>