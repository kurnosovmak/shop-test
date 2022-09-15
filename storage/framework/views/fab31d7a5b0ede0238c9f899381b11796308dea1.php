<div <?php echo e($attributes->merge(['class'=>'bg-gray-100 border-l-8 border-gray-200'])->except(['title', 'price', 'action'])); ?>>
    <div class="p-4 flex items-center border border-gray-100">
        <div class="w-16 h-16 bg-white flex items-center justify-center border border-gray-300">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.logo-outline','data' => ['class' => 'w-8 h-8']]); ?>
<?php $component->withName('logo-outline'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'w-8 h-8']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        </div>

        <div class="flex-grow ml-4">
            <h3 class="flex justify-between font-semibold text-lg">
                <span><?php echo e($title ?? ''); ?></span>
                <?php if(isset($amount)): ?>
                    <?php echo e($amount); ?> &times;
                <?php endif; ?>
            </h3>
            <div class="text-green-500 font-display"><?php echo e($price ?? ''); ?></div>
        </div>
    </div>
    <?php
        use Illuminate\Support\Facades\Auth;
    ?>

    <?php if(isset($actionUrl)): ?>
        <div class="px-4 pb-4 flex justify-end">
            <a href="<?php echo e(Auth::user() ? $actionUrl : route('login')); ?>">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['type' => 'button']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'button']); ?>
                    <?php echo e(Auth::user() ? $actionLabel ?? 'Add to cart' : 'Log in'); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </a>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH D:\PhpProjects\tz-domain\resources\views/components/product.blade.php ENDPATH**/ ?>