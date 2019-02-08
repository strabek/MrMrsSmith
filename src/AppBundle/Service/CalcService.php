<?php

namespace AppBundle\Service;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Calc Service
 */
class CalcService
{
    public function buildCalcForm($formBuilder)
    {
    	return $formBuilder
            ->add('calcValue_1', TextType::class, array(
               'attr'  => array(
                    'readonly' => true,
                    'class' => 'form-control'
                ),
               'label' => false,
               'constraints' => array(
                   new NotBlank(),
               ),
            ))
            ->add('calcMath', TextType::class, array(
               'attr'  => array(
                    'readonly' => true,
                    'class' => 'form-control'
                ),
               'label' => false
           ))->add('calcValue_2', TextType::class, array(
               'attr'  => array(
                    'readonly' => true,
                    'class' => 'form-control'
                ),
               'label' => false,
               'constraints' => array(
                   new NotBlank()
               ),
            ))
            ->add('Calculate', SubmitType::class, array(
                'attr' => array(
                    'class' => 'btn btn-success btn-calculate'
                )
            ))
            ->add('1', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-num',
                    'value' => 1
                )
            ))
            ->add('2', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-num',
                    'value' => 2
                )
            ))
            ->add('3', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-num',
                    'value' => 3
                )
            ))
            ->add('4', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-num',
                    'value' => 4
                )
            ))
            ->add('5', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-num',
                    'value' => 5
                )
            ))
            ->add('6', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-num',
                    'value' => 6
                )
            ))
            ->add('7', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-num',
                    'value' => 7
                )
            ))
            ->add('8', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-num',
                    'value' => 8
                )
            ))
            ->add('9', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-num',
                    'value' => 9
                )
            ))
            ->add('0', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-num',
                    'value' => 0
                )
            ))
            ->add('.', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-decimal-point',
                    'value' => '.'
                )
            ))
            ->add('+', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-math',
                    'value' => '+'
                )
            ))
            ->add('-', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-math',
                    'value' => '-'
                )
            ))
            ->add('*', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-math',
                    'value' => '*'
                )
            ))
            ->add('/', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-math',
                    'value' => '/'
                )
            ))
            ->add('OR', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-math',
                    'value' => 'OR'
                )
            ))
            ->add('AND', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-primary btn-lg btn-math',
                    'value' => 'AND'
                )
            ))
            ->add('Reset', ButtonType::class, array(
                'attr' => array(
                    'class' => 'btn btn-danger btn-lg btn-reset'
                )
            ))
            ->getForm();
    }

    public function doMath($calcValue_1, $calcValue_2, $calcMath)
    {
    	switch ($calcMath) {
            case '+':
                $calcResult = $calcValue_1 + $calcValue_2;
                break;
            case '-':
                $calcResult = $calcValue_1 - $calcValue_2;
                break;
            case '*':
                $calcResult = $calcValue_1 * $calcValue_2;
                break;
            case '/':
                $calcResult = $calcValue_1 / $calcValue_2;
                break;
            case 'OR':
                $calcResult = $calcValue_1 | $calcValue_2;
                break;
            case 'AND':
                $calcResult = $calcValue_1 & $calcValue_2;
                break;
            default:
                # code...
                break;
        }

        return $calcResult;
    }
}