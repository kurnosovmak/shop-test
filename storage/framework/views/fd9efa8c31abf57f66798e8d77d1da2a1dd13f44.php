<?php
    /** @var \Illuminate\Pagination\LengthAwarePaginator|\App\Domain\Order\Projections\Order[] $orders */
    /** @var \App\Domain\Order\Projections\Order $order */
?>

<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, ['title' => 'My Orders']); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>

    <table class="w-full">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-200">
                <th class="text-left uppercase text-gray-600 text-xs px-4 py-2">
                    Order
                </th>
                <th class="text-left uppercase text-gray-600 text-xs px-4 py-2">
                    Status
                </th>
                <th class="text-left uppercase text-gray-600 text-xs px-4 py-2">
                    Created
                </th>
                <th class="text-left uppercase text-gray-600 text-xs px-4 py-2">
                    Total
                </th>
                <th class="text-left uppercase text-gray-600 text-xs px-4 py-2">
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="border-b border-gray-200">
                    <td class="px-4 py-2">
                        <h2>
                            <a href="<?php echo e(action(\App\Http\Controllers\Orders\OrderDetailController::class, [$order])); ?>" class="underline hover:text-red-500 font-bold">
                                <?php echo e($order->order_number); ?>

                            </a>
                        </h2>
                    </td>
                    
                    <td class="px-4 py-2 <?php echo e($order->state->color()); ?>">
                        <?php echo e($order->state->label()); ?>

                    </td>
                    <td class="px-4 py-2">
                        <?php echo e($order->created_at->format('Y-m-d H:i')); ?>

                    </td>
                    <td class="px-4 py-2 font-semibold">
                        <?php echo e(format_money($order->total_item_price_including_vat)); ?>

                    </td>

                    <td class="px-4 py-2 text-right whitespace-nowrap">
                        <?php if($order->shouldBePaid()): ?>
                            <a class="underline hover:text-red-500 mr-4" href="<?php echo e(action(\App\Http\Controllers\Payment\FailController::class, [$order->payment])); ?>">Cancel order</a>
                            <a href="<?php echo e(action(\App\Http\Controllers\Payment\PayController::class, [$order->payment])); ?>">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['type' => 'button']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'button']); ?>Pay Now <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </a>
                        <?php endif; ?>

                        <?php if($order->isPaid()): ?>
                            <a target="_blank" href="<?php echo e(action(\App\Http\Controllers\Orders\OrderPdfController::class, [$order])); ?>">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['type' => 'button']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['type' => 'button']); ?>PDF <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="mx-auto mt-12">
        <?php echo e($orders->links()); ?>

    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH D:\PhpProjects\tz-domain\resources\views/orders/index.blade.php ENDPATH**/ ?>