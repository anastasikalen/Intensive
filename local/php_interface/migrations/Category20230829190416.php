<?php

namespace Sprint\Migration;


class Category20230829190416 extends Version
{
    protected $description = "";

    protected $moduleVersion = "4.2.4";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'products',
            'products'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            array (
  0 => 
  array (
    'NAME' => 'Косметика',
    'CODE' => 'kosmetika',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  1 => 
  array (
    'NAME' => 'Мебель',
    'CODE' => 'mebel',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
  2 => 
  array (
    'NAME' => 'Игрушки',
    'CODE' => 'igrushki',
    'SORT' => '500',
    'ACTIVE' => 'Y',
    'XML_ID' => NULL,
    'DESCRIPTION' => '',
    'DESCRIPTION_TYPE' => 'text',
  ),
)        );
    }

    public function down()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'products',
            'products'
        );

        if ($iblockId) {
            $sections = array(
                'kosmetika',
                'mebel',
                'igrushki',
            );

            foreach ($sections as $sectionCode) {
                $section = $helper->Iblock()->getSection($iblockId, $sectionCode);
                if ($section) {
                    $helper->Iblock()->deleteSection($section['ID']);
                }
            }
        }
    }
}
