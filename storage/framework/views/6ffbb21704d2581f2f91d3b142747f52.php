<script>
    function nextImg(event) {
        let img = document.getElementById("img");
        let imgId = img.alt;
        let images = <?php echo json_encode(
            $topic->images->map(function ($image) {
                $image->imagePath = Storage::url($image->image);
                return $image;
            }), 15, 512) ?>;

        let index = images.findIndex(item => item.id.toString() === imgId);

        if (index + 1 < images.length) {
            let next = index + 1;
            img.alt = images[next].id.toString();
            img.src = images[next].imagePath;
        }

        setButtonColor(images, img);
    }

    function previousImg(event) {
        let img = document.getElementById("img");
        let imgId = img.alt;
        let images = <?php echo json_encode(
            $topic->images->map(function ($image) {
                $image->imagePath = Storage::url($image->image);
                return $image;
            }), 15, 512) ?>;

        let index = images.findIndex(item => item.id.toString() === imgId);

        if (index - 1 >= 0) {
            let next = index - 1;
            img.alt = images[next].id.toString();
            img.src = images[next].imagePath;
        }

        setButtonColor(images, img);
    }

    function setButtonColor(images, img) {
        let previousButton = document.getElementById("left");
        let leftButtonStyle = previousButton.getAttribute("class");
        leftButtonStyle = img.alt === images[0].id.toString() ?
            leftButtonStyle.replace(/(text-gray-)[\d]+/, "$1400") :
            leftButtonStyle.replace(/(text-gray-)[\d]+/, "$10")
        previousButton.setAttribute('class', leftButtonStyle);

        let nextButton = document.getElementById("right");
        let rightButtonStyle = nextButton.getAttribute("class");
        rightButtonStyle = img.alt === images[images.length - 1].id.toString() ?
            rightButtonStyle.replace(/(text-gray-)[\d]+/, "$1400") :
            rightButtonStyle.replace(/(text-gray-)[\d]+/, "$10")
        nextButton.setAttribute('class', rightButtonStyle);
    }

    function editComment(commentId, comment) {
        let edit = document.getElementById("edit-" + commentId);
        let editComment = document.getElementById("editComment-" + commentId);

        edit.hidden = !edit.hidden;

        if (!edit.hidden) {
            editComment.value = comment;
        }
    }
</script>

<?php
    $currentBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out';
    $sideBar =
        'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
?>

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('layouts.navigationHome', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex flex-col w-6xl p-2 gap-3 text-left">
        
        <div>
            <a href="<?php echo e(back()->getTargetUrl()); ?>" class="flex gap-2 items-center w-max">
                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-arrow-left'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-5 h-5']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                <span>Voltar</span>
            </a>
        </div>
        
        <div class="flex flex-col gap-4 rounded-sm shadow p-1">
            
            <div class="text-3xl p-1 border-b-2"><?php echo e($topic->title); ?></div>
            
            <div class="p-1 whitespace-pre-line"><?php echo e($topic->description); ?></div>
            
            <?php if($topic->images->isNotEmpty()): ?>
                <div class="flex justify-center w-full">
                    <div class="flex flex-row justify-center gap-1">
                        <button id="left" name="<?php echo e($topic->images[0]->id); ?>" onclick="previousImg(event)"
                            class="bg-gray-100/20 text-gray-400 hover:bg-gray-400/30">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-chevron-left'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-10']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                        </button>
                        <div id="topic-image" class="w-fit max-w-full max-h-100 flex items-center justify-center">
                            <img id="img" src="<?php echo e(Storage::url($topic->images[0]->image)); ?>"
                                alt="<?php echo e($topic->images[0]->id); ?>"
                                class="max-w-full max-h-full h-auto w-auto object-contain">
                        </div>
                        <button id="right" name="<?php echo e($topic->images[0]->id); ?>" onclick="nextImg(event)"
                            class="bg-gray-100/20 <?php echo e($topic->images->count() > 1 ? 'text-gray-0' : 'text-gray-400'); ?> hover:bg-gray-400/30">
                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-chevron-right'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'w-10']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                        </button>
                    </div>
                </div>
            <?php endif; ?>
            
            <div class="p-1 text-right">
                <div class="font-bold">
                    <p class="text-xs"><?php echo e($topic->user->username); ?></p>
                    <p><?php echo e($topic->user->name); ?></p>
                </div>
                <p><?php echo e($topic->created_at->format('d/m/Y H:i')); ?></p>
            </div>
        </div>
        
        <div class="flex flex-col gap-2">
            <div class="text-3xl p-1">Comentários</div>
            <?php if(auth()->guard()->check()): ?>
                <div class="">
                    <form method="POST" action="<?php echo e(route('comment', ['topic' => $topic, 'user' => Auth::user()])); ?>"
                        class="flex flex-col gap-2 items-end">
                        <?php echo csrf_field(); ?>
                        <textarea name="comment" id="comment" class="w-full h-30 border ring-2 ring-gray-700 rounded-sm p-2"><?php echo e(old('comment')); ?></textarea>
                        <input type="submit" value="Comentar"
                            class="border w-max px-2 rounded-2xl bg-gray-100/80 text-gray-700 font-semibold text-lg flex items-center justify-center">
                    </form>
                </div>
            <?php endif; ?>
            <?php if(auth()->guard()->guest()): ?>
                <div class="flex items-center justify-center h-30 bg-gray-600/50 rounded-sm">
                    <a href="<?php echo e(route('login')); ?>" class="hover:text-blue-400">Faça login para continuar</a>
                </div>
            <?php endif; ?>
            <?php if($topic->comments->isNotEmpty()): ?>
                <ul>
                    <?php $__currentLoopData = $topic->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="">
                            <div id="comment-<?php echo e($comment->id); ?>" class="flex flex-raw border">
                                <div class="flex flex-col gap-1 p-2 <?php echo e(Auth::check() ? 'w-19/20' : 'w-full'); ?>">
                                    <div class="font-bold">
                                        <p><?php echo e($comment->user->name); ?></p>
                                        <p class="text-xs"><?php echo e($comment->user->username); ?></p>
                                    </div>
                                    <p class="whitespace-pre-line"><?php echo e($comment->comment); ?></p>
                                    <p class="text-right">
                                        <?php if($comment->created_at->ne($comment->updated_at)): ?>
                                            <span class="text-gray-400 text-xs">Editado</span>
                                        <?php endif; ?>
                                        <?php echo e($comment->created_at->format('d/m/Y H:i')); ?>

                                    </p>
                                </div>
                                <?php if(auth()->guard()->check()): ?>
                                    <div class="flex flex-col gap-1 w-1/20 text-gray-700 p-1">
                                        <button class="flex justify-center items-center h-1/2 bg-red-200 rounded-tl-md"
                                            onclick="editComment(<?php echo e($comment->id); ?>, <?php echo e(Js::from($comment->comment)); ?>)">
                                            <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-square-pen'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'h-10 w-10 transition-all duration-150 hover:h-11 hover:w-11 hover:stroke-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                        </button>
                                        <form action="<?php echo e(route('comment.delete', ['comment' => $comment->id])); ?>"
                                            method="post"
                                            onsubmit="return confirm('Deseja realmente excluir este comentário?')"
                                            class="flex flex-col justify-center items-center h-1/2 py-2 pl-1 bg-red-200 rounded-bl-md">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>

                                            <button type="submit">
                                                <?php if (isset($component)) { $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c = $attributes; } ?>
<?php $component = BladeUI\Icons\Components\Svg::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('lucide-trash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\BladeUI\Icons\Components\Svg::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'text-red-500 w-10 h-10 transition-all duration-150 hover:h-11 hover:w-11 hover:stroke-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $attributes = $__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__attributesOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c)): ?>
<?php $component = $__componentOriginal643fe1b47aec0b76658e1a0200b34b2c; ?>
<?php unset($__componentOriginal643fe1b47aec0b76658e1a0200b34b2c); ?>
<?php endif; ?>
                                            </button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if(auth()->guard()->check()): ?>
                                <div id="edit-<?php echo e($comment->id); ?>" class="py-2" hidden>
                                    <form action="<?php echo e(route('comment.edit', $comment->id)); ?>" method="post"
                                        class="flex flex-col gap-2 items-end">
                                        <?php echo csrf_field(); ?>
                                        <textarea name="editComment" id="editComment-<?php echo e($comment->id); ?>"
                                            class="w-full h-30 border ring-2 ring-gray-700 rounded-sm p-2"><?php echo e(old('editComment') ? old('editComment') : $comment->comment); ?></textarea>
                                        <input type="submit" value="Editar"
                                            class="border w-max px-2 rounded-2xl bg-gray-100/80 text-gray-700 font-semibold text-lg flex items-center justify-center">
                                    </form>
                                </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/topicPage.blade.php ENDPATH**/ ?>