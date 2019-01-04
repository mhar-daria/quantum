<?php
namespace cf47\plugin\realtyspace\module\faq;

use cf47\themecore\AbstractQueryRepository;

/**
 * @method Entity[] find_from_loop
 * @method Entity[] find_all
 */
class Repository extends AbstractQueryRepository
{
    public function find_from_loop_grouped_by_category()
    {
        $entities = $this->find_from_loop();
        return $this->group_collection_by_category($entities);
    }

    /**
     * @param Entity[] $entities
     *
     * @return array
     */
    private function group_collection_by_category($entities, array $category_id_whitelist = null)
    {
        $items = [];
        foreach ($entities as $entity) {
            if (count($entity->categories())) {
                foreach ($entity->categories() as $category) {
                    if ($category_id_whitelist === null ||
                        ($category_id_whitelist !== null && in_array($category->id(), $category_id_whitelist))
                    ) {
                        if (!isset($items[$category->id()])) {
                            $items[$category->id()] = [
                                'category' => $category,
                                'items' => []
                            ];
                        }
                        $items[$category->id()]['items'][] = $entity;
                    }
                }
            } else {
                $items[0][] = $entity;
            }
        }

        ksort($items);

        return $items;
    }

    public function find_all_grouped_by_category()
    {
        $entities = $this->find_all();

        return $this->group_collection_by_category($entities);
    }

    /**
     * @param $ids
     *
     * @return Entity[]
     */
    public function find_by_category_ids_grouped(array $ids)
    {
        $items = $this->find_by_category_ids($ids);

        return $this->group_collection_by_category($items, $ids);
    }

    /**
     * @param $ids
     *
     * @return Entity[]
     */
    public function find_by_category_ids(array $ids)
    {
        return $this->find_by_taxonomy_ids($ids, 'cf47rs_faq');
    }
}
