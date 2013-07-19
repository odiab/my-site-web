<?php
namespace osdiab\PHPFramework\Data\Model;

/**
 * Represents an object with a data binding.
 */
abstract class Model
{
  //*****************
  //* INSTANCE VARS *
  //*****************

  /** @var Collection */
  protected $collection;

  /** @var array */
  protected $data;

  //******************
  //* STATIC METHODS *
  //******************

  public static function load(Query $q)
  {
    $collection->query($q);
  }

  public static function loadId(Id $id)
  {
    $q = new Query();
    $q->equals($id);
    self::load($q);
  }

  //********************
  //* INSTANCE METHODS *
  //********************

  public function __construct(Collection $collection)
  {
    $this->collection = $collection;
    $data = array();
  }

  public function save()
  {
    if (isset($this->data['id'])) {
      $collection->insert($this->data);
    } else {
      $collection->update($this->data);
    }
  }
}
