<?php
/**
 * Observer.php
 * @author Alex Powell
 */

/**
 * Class Apowell_BlockComments_Model_Observer
 */
class Apowell_BlockComments_Model_Observer
{
    /**
     * @param Varien_Event_Observer $observer
     */
    public function setFrameTags(Varien_Event_Observer $observer)
    {
        if ( !Mage::getStoreConfig('dev/debug/comments') ) {
            return;
        }
        /** @var Mage_Core_Block_Abstract $block */
        $block = $observer->getBlock();
        $block->setFrameTags(
            sprintf('!-- Begin (Name: %s | As: %s | Template: %s | Class: %s) --',
                $block->getNameInLayout(),
                $block->getBlockAlias(),
                $block->getTemplate(),
                get_class($block)
            ),
            sprintf('!-- End (Name: %s | As: %s) --', $block->getNameInLayout(), $block->getBlockAlias())
        );
    }
}

