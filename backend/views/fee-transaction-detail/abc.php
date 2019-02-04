<?php
if($updateStatus == '1'){
                    $transId = $headTransId[0]['fee_trans_id'];
                        
                    for($i=0; $i<$length; $i++){
                        $detailID = Yii::$app->db->createCommand("SELECT fee_trans_detail_id FROM fee_transaction_detail where fee_trans_detail_head_id = '$transId'")->queryAll();
                        $detailId = $detailID[$i]['fee_trans_detail_id'];
                        for($i=0; $i<$length; $i++){
                            for($j=0;$j<6;$j++){
                                        if($feeType[$j] == 1 && $admission_fee[$i] != 0){
                                            $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                            'fee_trans_detail_head_id' => $transId+$i,
                                            'fee_type_id'=> $feeType[$j],
                                            'fee_amount'=> $admission_fee[$i]],
                                            ['fee_trans_detail_id' => $detailId+$i] 
                                            )->execute();
                                        }
                                        if($feeType[$j] == 2 && $tuition_fee[$i] != 0){
                                            $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                            'fee_trans_detail_head_id' => $transId+$i,
                                            'fee_type_id'=> $feeType[$j],
                                            'fee_amount'=> $tuition_fee[$i]],
                                            ['fee_trans_detail_id' => $detailId+$i]  
                                            )->execute();
                                        }
                                        if($feeType[$j] == 3 && $late_fee_fine[$i] != 0){
                                            $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                            'fee_trans_detail_head_id' => $transId+$i,
                                            'fee_type_id'=> $feeType[$j],
                                            'fee_amount'=> $late_fee_fine[$i]],
                                            ['fee_trans_detail_id' => $detailId+$i] 
                                            )->execute();
                                        }
                                        if($feeType[$j] == 4 && $absent_fine[$i] != 0){
                                            $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                            'fee_trans_detail_head_id' => $transId+$i,
                                            'fee_type_id'=> $feeType[$j],
                                            'fee_amount'=> $absent_fine[$i]],
                                            ['fee_trans_detail_id' => $detailId+$i]  
                                            )->execute();
                                        }
                                        if($feeType[$j] == 5 && $library_dues[$i] != 0){
                                            $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                            'fee_trans_detail_head_id' => $transId+$i,
                                            'fee_type_id'=> $feeType[$j],
                                            'fee_amount'=> $library_dues[$i]],
                                            ['fee_trans_detail_id' => $detailId+$i] 
                                            )->execute();
                                        }
                                        if($feeType[$j] == 6 && $transport_fee[$i] != 0){
                                            $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                            'fee_trans_detail_head_id' => $transId+$i, 
                                            'fee_type_id'=> $feeType[$j],
                                            'fee_amount'=> $transport_fee[$i]], 
                                            ['fee_trans_detail_id' => $detailId+$i] 
                                            )->execute();
                                        }
                                    //end of j for loop
                                    }
                        //end of i for loop
                        }    
                        
                    } 
} ?>
                  


  for ($c=0; $c < $count ; $c++) { 
                                $feeTypeId = $detailID[$c]['fee_type_id'];
                                // late fee fine 
                                if($feeType[$k] == $feeTypeId){
                                    if($feeType[$k] == 3 && $late_fee_fine[$j] != 0){
                                                $detailId = $detailID[$c]['fee_trans_detail_id'];
                                                $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                                'fee_trans_detail_head_id' => $id,
                                                'fee_type_id'=> $feeType[$k],
                                                'fee_amount'=> $late_fee_fine[$j]],
                                                ['fee_trans_detail_id' => $detailId] 
                                                )->execute();
                                            }
                                }   
                                else {
                                    if($feeType[$k] == 3 && $late_fee_fine[$j] != 0){
                                            $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                            'fee_trans_detail_head_id' => $id,
                                            'fee_type_id'=> $feeType[$k],
                                            'fee_amount'=> $late_fee_fine[$j],
                                            ])->execute();
                                        }
                                }
                            // end of counter loop    
                            }                     
                 
                 // admission fee
                            if($feeType[$k] == $feeTypeId){
                                if($feeType[$k] == 1 && $admission_fee[$j] != 0){
                                    $detailId = $detailID[$k]['fee_trans_detail_id'];
                                    echo $detailId."<br>";
                                    $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                    'fee_trans_detail_head_id' => $id,
                                    'fee_type_id'=> $feeType[$k],
                                    'fee_amount'=> $admission_fee[$j]],
                                    ['fee_trans_detail_id' => $detailId] 
                                    )->execute();
                                }
                            }
                            else {
                                if($feeType[$k] == 1 && $admission_fee[$j] != 0){
                                $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                'fee_trans_detail_head_id' => $headId,
                                'fee_type_id'=> $feeType[$k],
                                'fee_amount'=> $admission_fee[$j], 
                                ])->execute();
                                }
                            }
                            // tuition fee
                            if($feeType[$k] == $feeTypeId){
                                if($feeType[$k] == 2 && $tuition_fee[$j] != 0){
                                    $detailId = $detailID[$k]['fee_trans_detail_id'];
                                    $feeDetails = Yii::$app->db->createCommand()->update('fee_transaction_detail',[
                                    'fee_trans_detail_head_id' => $id,
                                    'fee_type_id'=> $feeType[$k],
                                    'fee_amount'=> $tuition_fee[$j]],
                                    ['fee_trans_detail_id' => $detailId]  
                                    )->execute();
                                }
                            } 
                            else {
                                if($feeType[$k] == 2 && $tuition_fee[$j] != 0){
                                    $feeDetails = Yii::$app->db->createCommand()->insert('fee_transaction_detail',[
                                    'fee_trans_detail_head_id' => $headId,
                                    'fee_type_id'=> $feeType[$k],
                                    'fee_amount'=> $tuition_fee[$j], 
                                    ])->execute();
                                }
                            } 