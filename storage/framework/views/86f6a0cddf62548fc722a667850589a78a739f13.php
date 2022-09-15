<?php
    /**
     * @var \Illuminate\Pagination\LengthAwarePaginator
     * @var \App\Domain\Product\Product[] $products
     * @var \App\Domain\Category\Category[] $categories
     * @var int $category_selected
     * @var \App\Domain\City\City[] $cities
     * @var int[] $cities_selected
     */
?>

<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, ['title' => 'Products']); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div class="filter">
        <form method="GET">
            <select name="category">
                <option
                    <?php if($category_selected === null): ?>
                    selected
                    <?php endif; ?>
                    value="">All</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option
                        <?php if($category->id == $category_selected): ?>
                        selected
                        <?php endif; ?>
                        value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <select name="cities[]" multiple>
                <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option
                        <?php if(count($cities_selected->where('id',$city->id))>0 || count($cities_selected) ===0): ?>
                        selected
                        <?php endif; ?>
                        value="<?php echo e($city->id); ?>"><?php echo e($city->text); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <input type="submit" value="search">
        </form>
    </div>
    <div class="grid grid-cols-3 gap-12">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.product','data' => ['title' => $product->name,'price' => format_money($product->getItemPrice()->pricePerItemIncludingVat()),'actionUrl' => action(\App\Http\Controllers\Cart\AddCartItemController::class, [$product])]]); ?>
<?php $component->withName('product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->name),'price' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(format_money($product->getItemPrice()->pricePerItemIncludingVat())),'actionUrl' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(action(\App\Http\Controllers\Cart\AddCartItemController::class, [$product]))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="mx-auto mt-12">
        <?php echo e($products->links()); ?>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH D:\PhpProjects\tz-domain\resources\views/products/index.blade.php ENDPATH**/ ?>