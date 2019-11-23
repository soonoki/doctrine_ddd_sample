<?php

namespace App\Tests\Unit\UseCase;

use App\Entity\PurchaseOrder\PurchaseOrderId;
use App\Repository\InMemoryPurchaseOrderRepository;
use App\UseCase\CreateOrderLineInputData;
use App\UseCase\CreatePurchaseOrderInputData;
use App\UseCase\CreatePurchaseOrderUseCase;
use PHPUnit\Framework\TestCase;

class CreatePurchaseOrderUseCaseTest extends TestCase
{
    public function testHandle()
    {
        // データ準備
        $repository = new InMemoryPurchaseOrderRepository();
        $inputData = new CreatePurchaseOrderInputData(
            'order-number-001',
            '000-0000',
            '東京都',
            '中野区',
            [
                new CreateOrderLineInputData('PRODUCT-ID-001', 5),
                new CreateOrderLineInputData('PRODUCT-ID-002', 1),
            ]
        );

        // UseCase作成＋実行
        $useCase = new CreatePurchaseOrderUseCase($repository);
        $outputData = $useCase->handle($inputData);

        // 保存結果をチェック
        $this->assertTrue($outputData->isSuccess());

        // 保存されたモデルの内容チェック
        $order = $repository->findBy(new PurchaseOrderId($outputData->generatedPurchaseId()));
        $this->assertSame('order-number-001', $order->getOrderNumber());
    }
}
