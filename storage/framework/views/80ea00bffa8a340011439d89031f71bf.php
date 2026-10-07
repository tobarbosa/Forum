<?php $__env->startSection('content'); ?>
    <div>
        <h1>Adicionar item</h1>
    </div>
    <div>
        <form method="POST" enctype="multipart/form-data" action="<?php echo e(route('item.store')); ?>" class="m-2">
            <?php echo csrf_field(); ?>
            <input type="text" name="name" id="" class="rounded-md border shadow-md my-1 px-2 pb-0.5"
                value="<?php echo e(old('name')); ?>" placeholder="Título">
            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <?php echo e($message); ?>

            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <br>
            <input type="text" name="summary" id="" class="rounded-md border shadow-md my-1 px-2 pb-0.5"
                value="<?php echo e(old('summary')); ?>" placeholder="Resumo">
            <?php $__errorArgs = ['summary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <?php echo e($message); ?>

            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <br>
            <input type="text" name="alternative_titles" id=""
                class="rounded-md border shadow-md my-1 px-2 pb-0.5" value="<?php echo e(old('alternative_titles')); ?>"
                placeholder="Título alternativo">
            <?php $__errorArgs = ['alternative_titles'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <?php echo e($message); ?>

            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <br>
            <input type="text" name="genres" id="" class="rounded-md border shadow-md my-1 px-2 pb-0.5"
                value="<?php echo e(old('genres')); ?>" placeholder="Gênero">
            <?php $__errorArgs = ['genres'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <?php echo e($message); ?>

            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <br>
            <input type="file" name="image"> <br>
            <button type="submit" class="rounded-md border shadow-md px-2 py-0.5 my-1">Salvar</button>
        </form>
    </div>
    <?php if($errors->any()): ?>
        <div>
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/items.blade.php ENDPATH**/ ?>